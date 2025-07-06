<?php
use App\Http\Controllers\ProductMediaController;
use Illuminate\Support\Facades\Route;

Route::prefix('products/{product}')
    ->as('products.')
    ->group(function () {
        Route::post('/media', [ProductMediaController::class, 'upload'])->name('media.upload');
        Route::get('/media', [ProductMediaController::class, 'list'])->name('media.list');
    });

Route::delete('/media/{media}', [ProductMediaController::class, 'delete'])->name('media.delete');
