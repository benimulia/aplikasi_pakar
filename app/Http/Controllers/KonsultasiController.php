<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pasien;
use App\Gejala;
use App\TempDiagnosa;
use App\Diagnosa;
use App\Penyakit;
use App\Kelamin;
use App\Solusi;
use App\User;
use Auth;
use PDF;
use App\BaseCase;
use App\BaseCaseGejala;

class KonsultasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function pasienForm()
    {
        $kelamin = Kelamin::all();
        return view('konsultasi_form_pasien', compact('kelamin'));
    }

    public function storePasien(Request $request)
    {
        $pasien = new Pasien;
        $pasien->nama = $request->nama;
        // $pasien->nik = $request->nik;
        $pasien->lokasi = $request->lokasi;
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->no_telpon = $request->no_telpon;
        $pasien->kelamin_id = $request->kelamin_id;
        $pasien->save();
        return $this->selectGejala($pasien->id);
    }

    private function selectGejala($pasien_id)
    {
        $gejala = Gejala::all();
        return view('konsultasi_form_gejala', compact('gejala', 'pasien_id'));
    }

    public function diagnosa(Request $request)
    {
        $pasien_id = $request->pasien_id;
        foreach ($request->gejala as $gejala_id) {
            $pasien = Pasien::find($pasien_id)->attachGejala($gejala_id);
            $gejala = Gejala::find($gejala_id);
            foreach ($gejala->penyakit as $penyakit) {
                $temp_diagnosa = TempDiagnosa::where('pasien_id', $pasien_id)->where('penyakit_id', $penyakit->id);
                $temp_diag = $temp_diagnosa->first();
                if (!$temp_diag) {
                    $temp_diag = new TempDiagnosa;
                    $temp_diag->pasien_id = $pasien_id;
                    $temp_diag->penyakit_id = $penyakit->id;
                    $temp_diag->gejala = count($penyakit->gejala);
                    $temp_diag->gejala_terpenuhi = 1;
                    $temp_diag->save();
                } else {
                    $temp_diag = $temp_diagnosa->update(['gejala_terpenuhi' => $temp_diag->gejala_terpenuhi + 1]);
                }
            }
        }

        $this->hitungPersen($pasien_id);

        $this->hasil($pasien_id);

        return redirect()->route('hasilDiagnosa', $pasien_id);
    }

    public function diagnosabayes(Request $request)
    {
        #data umum
        $pasien_id = $request->pasien_id;
        $count_case = BaseCase::count();
        $penyakit_count = [];
        $base_case = BaseCase::select('penyakit_id')->get();

        $penyakit_count = BaseCase::groupBy('penyakit_id')
            ->selectRaw('penyakit_id, COUNT(*) as jumlah')
            ->get();


        #menghitung probabilitas prior
        $penyakit_ratios = [];
        $likelihood_ratios = [];

        foreach ($penyakit_count as $penyakit) {
            $ratio = $penyakit->jumlah / $count_case;
            $penyakit_ratios[$penyakit->penyakit_id] = $ratio;
        }


        # mendapatkan gejala yang diinputkan oleh pengguna
        $gejala_input = $request->gejala;

        $gejala_count = DB::table('base_case_gejala')
            ->select('penyakit_id', 'gejala_id', DB::raw('COUNT(*) as jumlah'))
            ->join('base_case', 'base_case.id', '=', 'base_case_gejala.base_case_id')
            ->whereIn('gejala_id', $gejala_input)
            ->groupBy('penyakit_id', 'gejala_id')
            ->get();

        foreach ($gejala_count as $gc) {
            $penyakit_id = $gc->penyakit_id;
            $gejala_id = $gc->gejala_id;
            $gejala_jumlah = $gc->jumlah;

            $total_jumlah = $penyakit_count->firstWhere('penyakit_id', $penyakit_id)->jumlah;

            $likelihood_ratios[$penyakit_id]['penyakit_id'] = $penyakit_id;
            $likelihood_ratios[$penyakit_id][$gejala_id] = $gejala_jumlah / $total_jumlah;

        }

        # menghitung probabilitas posterior
        $posterior_probs = [];

        foreach ($penyakit_ratios as $penyakit_id => $prior_prob) {
            $posterior_prob = $prior_prob;
            $likelihood_values = [];

            foreach ($gejala_input as $gejala) {
                if (isset($likelihood_ratios[$penyakit_id][$gejala])) {
                    $likelihood_values[] = $likelihood_ratios[$penyakit_id][$gejala];
                }
            }

            if (!empty($likelihood_values)) {
                $posterior_prob *= array_product($likelihood_values);
            }

            $posterior_probs[] = [
                'penyakit_id' => $penyakit_id,
                'probabilitas' => $posterior_prob
            ];
        }

        # mengurutkan probabilitas posterior dari yang tertinggi ke terendah
        usort($posterior_probs, function ($a, $b) {
            return $b['probabilitas'] <=> $a['probabilitas'];
        });

        // mendapatkan penyakit_id dengan probabilitas tertinggi
        $penyakit_tertinggi = $posterior_probs[0]['penyakit_id'];
        $prob_tertinggi = $posterior_probs[0]['probabilitas'];
        $persen_prob = $prob_tertinggi * 100;        

        DB::beginTransaction();

        try {
            Diagnosa::create([
                'pasien_id' => $pasien_id,
                'penyakit_id' => $penyakit_tertinggi,
                'persentase' => $persen_prob
            ]);

            $basecase = new BaseCase();
            $basecase->penyakit_id = $penyakit_tertinggi;
            $basecase->save();

            $id_basecase = DB::table('base_case')->orderBy('id', 'DESC')->select('id')->first();
            $id_basecase = $id_basecase->id;

            foreach ($gejala_input as $key => $items) {

                $basecasegejala['gejala_id'] = $items;
                $basecasegejala['base_case_id'] = $id_basecase;

                BaseCaseGejala::create($basecasegejala);
            }

            DB::commit();
            return redirect()->route('hasilDiagnosa', $pasien_id);;
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('fail', 'Gagal menambahkan data');
        }

        
    }

    private function hitungPersen($pasien_id)
    {
        $temp_diags = TempDiagnosa::where('pasien_id', $pasien_id)->get();
        foreach ($temp_diags as $temp_diag) {
            $persen = ($temp_diag->gejala_terpenuhi / $temp_diag->gejala) * 100;
            TempDiagnosa::where('penyakit_id', $temp_diag->penyakit_id)
                ->where('pasien_id', $pasien_id)
                ->update(['persen' => $persen]);
        }
    }

    private function hasil($pasien_id)
    {
        $temp_diagnosa = TempDiagnosa::where('pasien_id', $pasien_id);
        $sum_persen = $temp_diagnosa->sum('persen');
        $temp_diag = $temp_diagnosa->get();
        foreach ($temp_diag as $diag) {
            $persentase = ($diag->persen / $sum_persen) * 100;
            $diagnosa = Diagnosa::create([
                'pasien_id' => $diag->pasien_id,
                'penyakit_id' => $diag->penyakit_id,
                'persentase' => $persentase
            ]);
        }

        // return $this->hapusTempDiagnosa($pasien_id);
    }

    private function hapusTempDiagnosa($pasien_id)
    {
        return TempDiagnosa::where('pasien_id', $pasien_id)->delete();
    }

    public function hasilDiagnosa($pasien_id)
    {
        $diagnosa = Diagnosa::where('pasien_id', $pasien_id)->first();
        return view('diagnosa', compact('diagnosa'));
    }



    public function print($pasien_id)
    {
        $diagnosa = Diagnosa::orderBy('created_at', 'desc')->where('pasien_id', $pasien_id)->first();
        return view('diagnosa', compact('diagnosa'));

    }


}