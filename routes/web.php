<?php

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
    return view('template.landing');
});

Route::get('/tentang', function(){
	return view('template.tentang');
});
Route::get('/template', function(){
	return view('tanggapan.editpdf2');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/masyarakat', 'Auth\LoginController@showMasyarakatLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/masyarakat', 'Auth\LoginController@masyarakatLogin');	

Route::get('/register','Auth\RegisterController@showRegister');
Route::post('/register','Auth\RegisterController@register');
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
// Route::get('/register/masyarakat', 'Auth\RegisterController@showMasyarakatRegisterForm');
// Route::post('/register/masyarakat', 'Auth\RegisterController@createMasyarakat');

	Route::view('/dashboard/admin', 'admin');
	Route::resource('admin','AdminController');
	Route::resource('masyarakat','MasyarakatController');
	Route::resource('kategori','KategoriController');
	Route::resource('tanggapan','TanggapanController');
	Route::get('/tanggapi/{id}','TanggapanController@edit')->name('tanggapan.edit');
	Route::get('/riwayattanggapan','TanggapanController@riwayat')->name('tanggapan.riwayat');
	Route::get('/detailriwayat/{id}','TanggapanController@show')->name('tanggapan.show');
	Route::get('/riwayattanggapan/cetakpdf','TanggapanController@cetakpdf');
	Route::get('/riwayattanggapan/cetakpdf_detail/{id}','TanggapanController@cetakpdf_detail');
	Route::get('/indextanggapan/cetak','TanggapanController@indexcetakpdf')->name('tanggapan.indexcetakpdf');
	Route::get('/edittanggapan/cetak/{id}','TanggapanController@editcetakpdf')->name('tanggapan.editcetakpdf');
	Route::get('/edittanggapan2/cetak/{id}','TanggapanController@editcetakpdf2')->name('tanggapan.editcetakpdf2');

	Route::resource('pengaduan','PengaduanController');
	Route::get('/lapor','PengaduanController@create')->name('pengaduan.create');
	Route::get('/riwayat','PengaduanController@index')->name('pengaduan.index');
	Route::get('/detail/{id}','PengaduanController@detail')->name('pengaduan.detail');


Route::view('/home', 'home')->middleware('auth');




