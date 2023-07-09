<?php

Route::any('products/search', 'ProductController@search')->name('products.search');
Route::resource('products', 'ProductController');

Route::get('/login', function(){
    return 'login';
})->name('login');

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::name('admin.')->group(function(){
        Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
            
        Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
        
        Route::get('/produtos', 'TesteController@teste')->name('products');

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        })->name('home');
    });
});

Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function(){
    return 'Hey hey hey';
})->name('url.name');

Route::view('/view', 'welcome', ['id' => 'teste']);

Route::redirect('/redirect1', '/redirect2');

Route::get('redirect2', function ($idProduct = '') {
    return 'Redirect 02';
});

// Parametro opicional
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($prm1) {
    return "Produtos da categoria: {$prm1}";
});

Route::match(['get','post'],'/math', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'Any';
});

Route::post('/register', function () {
    return '';
});

Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/ola', function () {
    return 'olá';
});

Route::get('/', function () {
    return view('welcome');
});
