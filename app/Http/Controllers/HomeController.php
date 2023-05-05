<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Apotik;
use App\Pakar;
use App\Kontak;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function admin()
    {
        return view('admin-home');
    }

    public function tentang(){
        return view('tentang');

    }
    public function spesialis(){
        return view('spesialis');

    }


    public function home()
    {
        $edit = User::all();

        return view('layouts.master', compact('edit'));
    }
    public function editPasien($id)
    {
         // mengambil data pegawai berdasarkan id yang dipilih
		$edit = DB::table('Users')->where('id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
        return view('seting-password',compact('edit'));

        // $user = User::find($id);
        // return view('seting-password',compact('user'));
    }



    
    public function updatePasien(Request $request, $id)
    {
        $user = User::find($id);
        if($request->input('password')){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =bcrypt($request->password);
        }
        else{
                $user->name = $request->name;
                $user->email = $request->email;
                $user->level = $request->level;
            }
        $user->update();
        return redirect('/home');
    }



    #Klinik-apotik
    public function apotik()
    {
        $apotik = Apotik::all();
        return view('klinik-apotik',compact('apotik'));
        
    }


    #dokter-pakar-controller
    public function dokter()
    {
        $pakar = Pakar::all();
        return view('dok-pakar',compact('pakar'));
    }


    #kontak
    public function Kontak()
    {
        $api = Kontak::all();
        return view('layouts.user',compact('api'));
    }




}
