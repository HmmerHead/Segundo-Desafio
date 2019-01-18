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

Route::get('produto', ['as' => 'produtos.index', 'uses' => 'Admin\ProdutoController@index']);
Route::get('produto/novo', ['as' => 'produtos.create', 'uses' => 'Admin\ProdutoController@create']);
Route::post('produto', ['as' => 'produtos.store', 'uses' => 'Admin\ProdutoController@store']);
Route::get('produto/{id}/edit', ['as' => 'produtos.edit', 'uses' => 'Admin\ProdutoController@edit']);
Route::put('produto/{id}', ['as' => 'produtos.update', 'uses' => 'Admin\ProdutoController@update']);
Route::delete('produto/{id}', ['as' => 'produtos.destroy', 'uses' => 'Admin\ProdutoController@destroy']);
