<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Swagger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swagger:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate swagger API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $openapi = \OpenApi\scan(app_path() . '/Http/Controllers');
        header('Content-Type: application/json');
        $json = $openapi->toJson();
        $json = preg_replace('/\s{0,}\*\s{0,}#\s{0,}/', '# ', $json);
        $json = preg_replace('/\s{0,}\\\\r\\\\n\s{0,}/', '\n', $json);
        $json = preg_replace('/\s{0,}\*\s{0,}/', '', $json);
        file_put_contents(public_path('swagger-ui/swagger.json'), $json);
        return 0;
    }
}
