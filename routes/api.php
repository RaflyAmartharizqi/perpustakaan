<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');
Route::get('/', function()
{
    return Auth::user()->level;
})->middleware('jwt.verify');

Route::get('user', 'PetugasController@getAuthenticatedUser')->middleware('jwt.verify');

#buku
Route::get('/index','BukuController@index')->middleware('jwt.verify');
Route::post('/create','BukuController@store')->middleware('jwt.verify');
Route::put('/update/{id}','BukuController@update')->middleware('jwt.verify');
Route::delete('/delete/{id}','BukuController@destroy')->middleware('jwt.verify');
Route::get('/tampil','BukuController@tampil')->middleware('jwt.verify');

#anggota
Route::get('/index_anggota','AnggotaController@index')->middleware('jwt.verify');
Route::post('/create_anggota','AnggotaController@store')->middleware('jwt.verify');
Route::put('/update_anggota/{id}','AnggotaController@update')->middleware('jwt.verify');
Route::delete('/delete_anggota/{id}','AnggotaController@destroy')->middleware('jwt.verify');
Route::get('/tampil_anggota','AnggotaController@tampil')->middleware('jwt.verify');