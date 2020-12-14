<?php

use Illuminate\Support\Facades\Route;

//ESSA LINHA SUBSTITUI TODAS AS ROTAS ABAIXO DE CRUD
Route::resource('products','ProductController');

/*
Route::delete('products/{id}','ProductController@destroy')->name('products.destroy');
Route::put('products/{id}','ProductController@update')->name('products.update');
Route::get('products/{id}/edit','ProductController@edit')->name('products.edit');
Route::get('products/create','ProductController@create')->name('products.create');
Route::get('products/{id}','ProductController@show')->name('products.show');
Route::get('products','ProductController@index')->name('products.index');
Route::post('products','ProductController@store')->name('products.store');*/

Route::get('login', function () {
    return "Login";
})->name('login');

//-------------------------------


//ROTAS COM PASSAGENS DE PARAMETROS
Route::get('/categoria/{flag}/post', function ($flag) {
    return "Categoria {$flag} para post";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Categoria {$flag}";
});
//ROTAS COM PASSAGENS DE PARAMETROS NÃO OBRIGATÓRIO
Route::get('/produtos/{idProduto?}', function ($idProduto='') {
    return "Produto ID {$idProduto} ";
});

//FUNCIONA COM OS TIPO DE REQUISIÇÕES ESPECIFICADOS VIA ARRAY (POST,GET,PUT,ETC...)
Route::match(['get','post','put'],'/match', function () {
    return "Match";
});

//FUNCIONA COM QUALQUER TIPO DE REQUISIÇÃO (POST,GET,PUT,ETC...)
Route::any('/any', function () {
    return "Any";
});

Route::get('/contato', function () {
    return view('sites.contato');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function () {
    return "Dados da empresa";
});

Route::get('/fogo', function () {
    return "Botafogo";
});

//REDIRECIONAMENTO DE ROTAS

Route::redirect('redirect1', 'redirect2');
// Route::get('/redirect1', function () {
//     return redirect('/redirect2');
// });

Route::get('/redirect2', function () {
    return "RE 2";
});

//ROTA CHAMANDO DIRETAMENTE UMA VIEW
Route::view('/view', 'welcome');

//TRABALHANDO AS ROTAS COM NAME -- MELHOR FORMA DE TRABALHAR
Route::get('/home-url', function () {
    return "Hey hey hum";
})->name('url.name');

Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});


//middleware -> FILTROS
/*Route::get('/admin/dashboard', function () {
    return "Home Admin";
})->middleware('auth');

Route::get('/admin/financeiro', function () {
    return "Financeiro Admin";
})->middleware('auth');

Route::get('/admin/produtos', function () {
    return "Product Admin";
})->middleware('auth');*/

/*
//GRUPOS DE ROTAS COM middleware
Route::middleware([])->group(function(){

    //GRUPOS DE ROTAS COM PREFIXO no caso (admin) caso das URL
    Route::prefix('admin')->group(function(){

        //GRUPOS DE NAMES INICIANDO COM (adm.) Todas as rotas os names irão começar com adm.
        Route::name('adm.')->group(function(){
            Route::get('/dashboard', 'Admin\TesteController@dashboard')->name('dash');
            Route::get('/financeiro', 'Admin\TesteController@financeiro')->name('finan');
            Route::get('/produtos', 'Admin\TesteController@produtos')->name('produto');
            Route::get('/', 'Admin\TesteController@home')->name('home');

            Route::get('/red', function(){
                //aqui é um caso de redirecionamento para o adm.dash
                return redirect()->route('adm.dash');
            })->name('red');
        });
    });
    
});*/

//MESMA COISA DO ESCRITO ACIMA, MAIS SIMPLES DE ESCREVER
Route::group([
    'middleware' => [],
    'prefix' => 'admin'
], function(){
    Route::get('/dashboard', 'Admin\TesteController@dashboard')->name('adm.dash');
    Route::get('/financeiro', 'Admin\TesteController@financeiro')->name('adm.finan');
    Route::get('/produtos', 'Admin\TesteController@produtos')->name('adm.produto');
    Route::get('/', 'Admin\TesteController@home')->name('adm.home');

    Route::get('/red', function(){
        //aqui é um caso de redirecionamento para o adm.dash
        return redirect()->route('adm.dash');
    })->name('red');
});

//TESTANDO REDIRECIONAMENTO DE FORA PARA DENTRO DO ADM
Route::get('/red', function(){
    //aqui é um caso de redirecionamento para o adm.dash
    return redirect()->route('adm.dash');
})->name('red');


/**
 * Comando criação de controllers
 * php artisan make:controller Admin\TesteController
 * 
 * Comando criar CRUD
 * php artisan make:controller ProductController --resource
 * 
 * Limpar as rotas em cache
 * php artisan route:cache
 * 
 * Ver as rotas
 * php artisan route:list
 */