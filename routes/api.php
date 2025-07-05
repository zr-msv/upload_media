<?php
use App\Http\Controllers\ProductMediaController;
use Illuminate\Support\Facades\Route;

Route::prefix('products/{product}')->group(function () {
Route::post('/media', [ProductMediaController::class, 'upload']);
Route::get('/media', [ProductMediaController::class, 'list']);
});

Route::delete('/media/{media}', [ProductMediaController::class, 'delete']);
