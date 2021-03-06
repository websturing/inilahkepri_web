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



Route::get("/inilahnews", "appControl@inilahnews");

Route::get("/berita/{id}/{judul}", "beritaControl@detail");
Route::get("/m/berita/{id}/{judul}", "beritaControl@oldToNew");

Route::get("/album/{id}/{judul}", "AlbumControl@detail");

Route::post("/master/berita", "beritaControl@index");
Route::post("/master/iklan", "iklanControl@index");
Route::post("/master/album", "AlbumControl@index");
Route::post("/master/kategori", "kategoriControl@index");
Route::post("/master/subkategori", "subkategoriControl@index");

Route::get("/{any}", "appControl@index")->where("any", ".*");
