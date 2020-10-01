<?php
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::resource('buku','BukuController');

Route::resource('profile', 'ProfileController');

Route::resource('pinjam', 'PinjamController');

Route::get('/home', 'HomeController@index');

Route::post('/buku/pinjam/{id}', [
    'as' => 'buku.pinjam',
    'uses' => 'BukuController@pinjam'
]);

Route::post('/pinjam/{id1}/{id2}', [
    'as' => 'pinjam.kembali',
    'uses' => 'PinjamController@kembali'
]);