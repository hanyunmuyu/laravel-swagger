<?php
/**
 * User: Only
 * Time: 16:35
 */

namespace Hanyun\Swagger;

use Illuminate\Support\ServiceProvider;

class SwaggerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置文件
        // php artisan vendor:publish --tag=swagger
        $this->publishes([
            __DIR__ . '/config/swagger.php' => config_path('swagger.php'),
            __DIR__ . '/swagger-ui/dist' => storage_path('app/public/swagger-ui'),
        ], 'swagger');

        // 加载视图，自定义视图的命名空间
        $this->loadViewsFrom(__DIR__ . '/view', 'hanyun');

        //加载自定义扩展路由
        $this->loadRoutesFrom(__DIR__ . '/routes/swagger.php');

        //加载自定义的console命令
        // php artisan swagger:generate
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    \Hanyun\Swagger\Commands\Swagger::class,
                ]
            );
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('swagger', function ($app) {
            return new Swagger();
        });

        //覆盖默认配置
        $this->mergeConfigFrom(__DIR__ . '/config/swagger.php', 'swagger');
    }
}
