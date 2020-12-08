<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->tokenCan('user');
});
Route::post('/registro','ControladorAlta@registro');
Route::post('/login','ControladorAlta@login');
Route::middleware('auth:sanctum')->post('/comentar','ControladorComentario@comentar');
Route::middleware('auth:sanctum')->post('/archivo/subir','ControladorArchivos@subir');

Route::middleware('auth:sanctum')->get('/ver','ControladorAlta@ver');
Route::get('/usuario/{id?}','ControladorAlta@usuario');

