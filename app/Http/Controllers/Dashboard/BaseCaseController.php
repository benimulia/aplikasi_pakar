<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Penyakit;
use App\Gejala;
use App\BaseCase;
use App\BaseCaseGejala;

class BaseCaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $basecase = BaseCase::all();
        $penyakit = Penyakit::all();
        $gejalas = Gejala::all();
        return view('dashboard.basecase', compact('penyakit', 'gejalas','basecase'));
    }

    public function create()
    {
        
    }

    public function show(BaseCase $basecase)
    {
        return view('dashboard.basecase-show');
    }

    public function edit()
    {
       
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $basecase = new BaseCase();
            $basecase->penyakit_id = $request->penyakit_id;
            $basecase->save();

            $id_basecase = DB::table('base_case')->orderBy('id', 'DESC')->select('id')->first();
            $id_basecase = $id_basecase->id;

            foreach ($request->gejala as $key => $items) {

                $basecasegejala['gejala_id'] = $items;
                $basecasegejala['base_case_id'] = $id_basecase;

                BaseCaseGejala::create($basecasegejala);
            }

            DB::commit();
            return back()->with('status', 'Data base case baru ditambahkan ke dalam knowledge base.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('fail', 'Gagal menambahkan data');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            /** delete record table basecasegejala */
            $basecasegejala = DB::table('base_case_gejala')->where('base_case_id', $id)->get();
            foreach ($basecasegejala as $id_basecasegejala) {
                DB::table('base_case_gejala')->where('id', $id_basecasegejala->id)->delete();
            }

            /** delete record table penjualan */
            BaseCase::destroy($id);

            DB::commit();
            return redirect()->back()->with('status', 'Data dihilangkan dari knowledge base.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('status', 'Gagal menghapus data. Silahkan coba lagi');
        }
    }



}