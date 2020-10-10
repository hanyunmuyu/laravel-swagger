<?php

namespace laravel\swagger\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SwaggerController extends Controller
{

    //
    public function index()
    {
        return view('swagger-ui.index');
    }
}
