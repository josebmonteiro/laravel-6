<?php

Route::get('/login', function(){
    return 'login';
})->name('login');

Route::middleware([])->group(function() {
    
    Route::prefix('panel')->group(function() {
        Route::get('/dashboard', function () {
            return 'Home admin';
        });
        
        Route::get('/financeiro', function () {
            return 'Financeiro admin';
        });
        
        Route::get('/produtos', function () {
            return 'Produtos admin';
        });

        Route::get('/', function () {
            return 'Admin';
        });
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
