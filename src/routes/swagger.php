<?php
/**
 * User: Only
 * Time: 17:04
 */

use Illuminate\Support\Facades\Route;

Route::get('/swagger', [\Hanyun\Swagger\Controllers\SwaggerController::class, 'index']);
