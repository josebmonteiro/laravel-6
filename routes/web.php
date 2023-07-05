<?php

Route::resource('products', 'ProductController'); //->middleware('auth');
/*
Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy');
Route::put('/products/{id}', 'ProductController@update')->name('products.update');
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::post('/products', 'ProductController@store')->name('products.store');
*/
Route::get('/login', function(){
    return 'login';
})->name('login');

/*
Route::middleware([])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::namespace('Admin')->group(function(){
            Route::name('admin.')->group(function(){
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('products');
    
                //Route::get('/', 'TesteController@teste')->name('admin.home');
    
                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});
*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'/*,
    'name' => 'admin.'*/ //para name não funciona
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


// Route::get('/admim/produtos', function () {
//     return 'Produtos admin';
// })->middleware('auth');


Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

// route('url.name');

Route::get('/nome-url', function(){
    return 'Hey hey hey';
})->name('url.name');

Route::view('/view', 'welcome', ['id' => 'teste']);

Route::redirect('/redirect1', '/redirect2');
// Route::get('redirect1', function ($idProduct = '') {
//     return redirect('/redirect2');
// });

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
