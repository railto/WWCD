<?php

use App\Http\Controllers\Search\SearchController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/searches');

Route::middleware('auth')->group(function () {
    Route::prefix('/searches')->name('searches.')->group(function () {
        Route::get('/', [SearchController::class, 'list'])->name('list');
        Route::get('/{search}', [SearchController::class, 'show'])->name('show');
    });
});

require __DIR__.'/auth.php';
