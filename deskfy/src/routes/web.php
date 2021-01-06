<?php

Route::prefix(config('deskfy.path'))->middleware(['web', 'auth'])->group(function() {
    
    Route::get('/', 'Deskfy\Http\Controllers\DashboardController')->name('deskfy');

});