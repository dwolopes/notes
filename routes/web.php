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
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'RequisicaoController@index')->name('home');

Route::get('requisicao/adicionar', 'RequisicaoController@create')->name('requisicao.adicionar');

Route::put('/requisicao/salvar', 'RequisicaoController@store')->name('requisicao.salvar');

Route::get('/requisicao/detalhar/{id}', 'RequisicaoController@show')->name('requisicao.detalhar');

Route::put('/requisicao/adicionar/atualizacao/{id}', 'AtualizacaoController@create')->name('atualizacao.adicionar');
