<?php
/**
 * User: Only
 * Time: 17:04
 */

use Illuminate\Support\Facades\Route;

Route::get('/swagger', [\laravel\swagger\Controllers\SwaggerController::class, 'index']);
