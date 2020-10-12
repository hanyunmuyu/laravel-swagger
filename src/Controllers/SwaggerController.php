<?php

namespace Hanyun\Swagger\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SwaggerController extends Controller
{

    //
    public function index()
    {
        //因为我们在 SwaggerProvider 里面这么定义了 所以可以这么（hanyun::index）加载视图
        // 加载视图，自定义视图的命名空间
        //$this->loadViewsFrom(__DIR__ . '/view', 'hanyun');

        return view('hanyun::index');
    }
}
