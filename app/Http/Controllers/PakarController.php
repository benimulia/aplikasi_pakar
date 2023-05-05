<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
Use App\Pakar;
use Redirect;

class PakarController extends Controller
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
    public function adminPakar()
    {
        $blog = Pakar::all();
        return view('dashboard/blog-pakar',compact('blog'));
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
        'nama' => 'required',
        'biografi' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = New Pakar;
        $blog->nama = $request->nama;
        $blog->biografi = $request->biografi;
      
        
        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('image/', $namafile);

        $blog->gambar = $namafile;
        $blog->save();
     return redirect('blog-pakar-admin')->with('pesan', 'Data berhasil disimpan');
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
        $blog = Pakar::find($id);
        $blog->delete();

        return redirect('/blog-pakar-admin');
    }
}
