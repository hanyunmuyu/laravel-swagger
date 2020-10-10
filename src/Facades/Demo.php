<?php
/**
 * User: Only
 * Time: 16:39
 */

namespace laravel\swagger\Facades;

use Illuminate\Support\Facades\Facade;

class Demo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'demo';
    }
}
