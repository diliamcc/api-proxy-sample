<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/random-image', [ApiController::class, 'randomImage']);
});
