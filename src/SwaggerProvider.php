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
        $this->publishes([
            __DIR__ . '/config/swagger.php' => config_path('swagger.php'),
            __DIR__ . '/routes/swagger.php' => base_path('routes/swagger.php'),
            __DIR__ . '/swagger-ui/dist' => public_path('swagger-ui'),
            __DIR__ . '/view' => resource_path('views/swagger-ui'),
            __DIR__ . '/Commands/Swagger.php' => app_path('Console/Commands/Swagger.php'),
        ]);
        include_once __DIR__ . '/routes/swagger.php';
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
    }
}
