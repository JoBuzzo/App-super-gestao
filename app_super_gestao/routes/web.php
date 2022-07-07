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

// Route::get('/', function () {
//     return 'Olá, seja bem-vindo ao curso!';
// });

// Route::get('/sobre-nos', function () {
    //     return 'Sobre-nós.';
// });
    
// Route::get('/contato', function () {
    //     return 'Contato.';
// });

// Route::get('/contato/{nome}/{categoria_id?}', function(string $nome='Desconhecido', int $categoria_id=1){
//     echo "<h2><strong>Estamos aqui:</strong></h2>";
//     echo "<strong>Nome: </strong>$nome<br>";
//     echo "<strong>Categoria: </strong>$categoria_id<br>";
// })->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

Route::get('/rota1',function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2',function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

// Route::redirect('/rota2','/rota1');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial';
});