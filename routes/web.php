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
    return view('index');
});

Route::prefix('api/v1')->group(function(){
  Route::post('login', [
    'uses'  => 'UsuarioCtrl@new_user',
  ]);
});

Route::prefix('api/v1/auth')->group(function(){
  Route::post('computer', [
    'uses'  => 'RegistrarComputadoraCtrl@registerComputer',
  ]);
});

Route::get('{any?}', function(){
	return view('index');
})->where('any', '.+');
