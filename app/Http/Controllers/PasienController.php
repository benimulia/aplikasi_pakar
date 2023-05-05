<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\kelamin;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $pasien = Pasien::all();
        return view('dashboard.pasien',compact('pasien'));
    }

    public function store(Request $request)
    {
        $pasien = new Pasien;
        $pasien->nama = $request->nama;
        $pasien->lokasi = $request->lokasi;
        // $pasien->save();
        return view('gejala');
    }

    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        return redirect('/dashboard/pasien');
    }


}
