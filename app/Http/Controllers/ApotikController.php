<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apotik;
use Redirect;

class ApotikController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminKlinik()
    {
        $apotik = Apotik::all();
        return view('dashboard/klinik-apotik',compact('apotik'));
    }

  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_apotik' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'alamat' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $apotik = New Apotik;
            $apotik->nama_apotik = $request->nama_apotik;
            $apotik->lat = $request->lat;
            $apotik->lng = $request->lng;
            $apotik->alamat = $request->alamat;
            

            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('images/', $namafile);

            $apotik->gambar = $namafile;
            $apotik->save();
         return redirect('/klinik-admin')->with('pesan', 'Data berhasil disimpan');

    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apotik = Apotik::find($id);
        $apotik->delete();

        return redirect('/klinik-admin');
    }

    
}
