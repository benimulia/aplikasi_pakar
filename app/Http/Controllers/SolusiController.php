<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class SolusiController extends Controller
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
    public function index()
    {
        $solusi = DB::table('solusi')->get();
        // return $solusi;
         return view ('dashboard.solusi',compact('solusi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('solusi')->insert([
			'nama_solusi' => $request->nama_solusi
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/solusi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
		$solusi = DB::table('solusi')->where('id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		return view('dashboard.solusi_form_edit',compact('solusi'));
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
        // update data solusi
		DB::table('solusi')->where('id',$request->id)->update([
			'nama_solusi' => $request->nama_solusi
		]);
		// alihkan halaman ke halaman solusi
		return redirect('/solusi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data solusi berdasarkan id yang dipilih
		DB::table('solusi')->where('id',$id)->delete();

		// alihkan halaman ke halaman solusi
		return redirect('/solusi');
    }
}
