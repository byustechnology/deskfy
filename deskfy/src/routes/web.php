<?php

Route::prefix(config('deskfy.path'))->middleware(['web', 'auth'])->group(function() {
    
    Route::get('boleto', 'Deskfy\Http\Controllers\BoletoController');
    Route::resource('cobranca/{cobranca}/boleto', 'Deskfy\Http\Controllers\CobrancaBoletoController')->only(['store', 'destroy']);
    Route::post('cobranca/{cobranca}/enviar', 'Deskfy\Http\Controllers\CobrancaAcaoController@enviar');
    Route::post('cobranca/{cobranca}/baixar', 'Deskfy\Http\Controllers\CobrancaAcaoController@baixar');
    Route::resource('cobranca/{cobranca}/arquivo', 'Deskfy\Http\Controllers\CobrancaArquivoController')->only(['store', 'destroy']);
    Route::resource('cobranca', 'Deskfy\Http\Controllers\CobrancaController');
    Route::resource('entidade/{entidade}/telefone', 'Deskfy\Http\Controllers\EntidadeTelefoneController')->only(['store', 'update', 'destroy']);
    Route::resource('entidade/{entidade}/email', 'Deskfy\Http\Controllers\EntidadeEmailController')->only(['store', 'update', 'destroy']);
    Route::resource('entidade', 'Deskfy\Http\Controllers\EntidadeController');
    Route::resource('empresa', 'Deskfy\Http\Controllers\EmpresaController');
    Route::get('/', 'Deskfy\Http\Controllers\DashboardController')->name('deskfy');


    // Rota referente ao storage
    Route::get('storage/{arquivo?}', 'Deskfy\Http\Controllers\StorageController')->where('arquivo', '(.*)');
});

require_once 'breadcrumbs.php';