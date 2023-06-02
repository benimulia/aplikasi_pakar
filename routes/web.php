<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin-home', 'HomeController@admin')->name('admin-home');
route::get('tentang','HomeController@tentang');
route::get('spesialis','HomeController@spesialis');
route::get('pasien','PasienController@index');
Route::get('/gejala', 'GejalaController@index');



#konsutasi
Route::get('/konsultasi', 'KonsultasiController@pasienForm')->name('pasienForm');
Route::post('/konsultasi', 'KonsultasiController@storePasien')->name('storePasien');
Route::post('/konsulltasi/diagnosa', 'KonsultasiController@diagnosabayes')->name('diagnosa');
Route::get('/konsultasi/{pasien_id}/hasil', 'KonsultasiController@hasilDiagnosa')->name('hasilDiagnosa');

#print

// Route::get('print/{pasien_id}/hasil', 'KonsultasiController@print')->name('hasilDiagnosa');
// Route::get('/konsultasi/{pasien_id}/hasil-print','KonsultasiController@print')->name('print_file');


//penyakit dan gejala
Route::resource('dashboard/gejala', 'Dashboard\GejalaController');
Route::resource('dashboard/penyakit', 'Dashboard\PenyakitController');
Route::resource('dashboard/basecase', 'Dashboard\BaseCaseController');

#pasien
Route::get('dashboard/pasien','PasienController@index');
Route::post('dashboard/pasien/deleted/{id}','PasienController@destroy')->name('pasein.destroy');

#data solusi 
Route::get('/solusi','SolusiController@index');
Route::post('/solusi/store','SolusiController@store');
Route::get('/solusi/edit/{id}','SolusiController@edit');
Route::post('/solusi/update','SolusiController@update');
Route::get('/solusi/hapus/{id}','SolusiController@destroy');


// user
Route::get('/user/id','UserController@index');
Route::get('/user/create','UserController@create')->name('user.create');
Route::post('/user','UserController@store')->name('user.store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{id}','UserController@update')->name('user.update');
Route::post('/user/delete/{id}','UserController@destroy')->name('user.destroy');

// Route::get('/seting-password/{id}','HomeController@editPasien')->name('seting-password.edit');
Route::get('/seting-password/edit/{id}','SetpasswordController@edit')->name('seting-password.edit');

Route::post('/seting-password/update/{id}','SetpasswordController@updatePasien')->name('seting-password.update');

//set password
Route::get('change-password', 'SetpasswordController@index');
Route::post('change-password', 'SetpasswordController@store')->name('change.password');

#kontak
// route::get('kontak','HomeController@kontak')->name('kontak');

route::get('kontak','KontakController@kontak')->name('kontak-admin');
route::post('api-wa','KontakController@store')->name('kontak-admin.store');
route::post('kontak/deleted/{id}','KontakController@destroy')->name('kontak-admin.destroy');



#apotik dan klinik 
Route::get('jelajah-klinik-apotik','HomeController@apotik')->name('klinik-apotik');
Route::get('/klinik-admin','ApotikController@adminKlinik');
Route::post('/klinik-apotik','ApotikController@store')->name('klinik-apotik.store');
Route::post('dashboard/klinik-apotik/deleted/{id}','ApotikController@destroy')->name('klinik-apotik.destroy');



#pakar-dokter
Route::get('biografi-pakar','HomeController@dokter')->name('dok-pakar');
Route::get('blog-pakar-admin','PakarController@adminPakar');
Route::post('blog-pakar-','PakarController@store')->name('blog-pakar.store');
Route::post('dashboard/blog-pakar/deleted/{id}','PakarController@destroy')->name('blog-pakar.destroy');
