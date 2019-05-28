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
    return redirect()->route('dashboard');
});

//Rotas de funcionarios
Route::get('/dashboard', ['uses' => 'DashboardController@enviaDashboard', 'as' => 'dashboard']);
Route::get('/funcionarios', ['uses' => 'FuncionariosController@getFuncionarios', 'as' => 'funcionarios']);
Route::get('/funcionarios/pesquisar', ['uses' => 'FuncionariosController@pesquisaFuncionario', 'as' => 'funcionarios.pesquisar']);

//Rotar da noticias
Route::post('/noticias/adicionar', ['uses' => 'NoticiaController@store', 'as' => 'noticias.adicionar']);
Route::get('/noticias/deletar/{id}', ['uses' => 'NoticiaController@destroy', 'as' => 'noticias.deletar']);
Route::get('/noticias', ['uses' => 'NoticiaController@index', 'as' => 'noticias']);

//Rotar da Auditoria
Route::post('/auditoria/adicionar', ['uses' => 'AuditoriaController@store', 'as' => 'auditoria.adicionar']);
Route::get('/auditorias', ['uses' => 'AuditoriaController@index', 'as' => 'auditorias']);
Route::get('/auditoria/deletar/{id}', ['uses' => 'AuditoriaController@destroy', 'as' => 'auditoria.deletar']);

//Rotas do Usuario
Route::post('/usuario/adicionar/', ['uses' => 'UsuarioController@store', 'as' => 'adicionar.usuario']);
Route::post('/usuario/editar/{id}', ['uses' => 'UsuarioController@update', 'as' => 'atualizar.usuario']);




Route::view('/notificacao', 'notifications')->name('notificacao');

Auth::routes();

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');
