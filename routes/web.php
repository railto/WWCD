<?php

use App\Http\Livewire\Search\CreateSearch;
use App\Http\Livewire\Search\ShowSearch;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/searches');

Route::middleware('auth')->group(function () {
    Route::prefix('/search')->name('searches.')->group(function () {
        Route::get('/', function () {
            return view('search.list');
        })->name('list');

        Route::get('/create', CreateSearch::class)->name('create');
        Route::get('/{search}', ShowSearch::class)->name('show');
    });
});

require __DIR__ . '/auth.php';
