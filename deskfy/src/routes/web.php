<?php

Route::prefix(config('deskfy.path'))->middleware(['web', 'auth'])->group(function() {
    
    Route::resource('cobranca', 'Deskfy\Http\Controllers\CobrancaController');
    Route::resource('entidade', 'Deskfy\Http\Controllers\EntidadeController');
    Route::resource('empresa', 'Deskfy\Http\Controllers\EmpresaController');
    Route::get('/', 'Deskfy\Http\Controllers\DashboardController')->name('deskfy');

});

require_once 'breadcrumbs.php';