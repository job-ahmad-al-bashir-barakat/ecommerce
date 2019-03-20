<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Orangehill\Iseed\IseedServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        if($this->app->environment('production')) {

            // force https
            $this->app['request']->server->set('HTTPS', true);

            // set db config
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

            $host = $url["host"];
            $username = $url["user"];
            $password = $url["pass"];
            $database = substr($url["path"], 1);

            \Config::set('database.connections.mysql.host',$host);
            \Config::set('database.connections.mysql.username',$username);
            \Config::set('database.connections.mysql.password',$password);
            \Config::set('database.connections.mysql.database',$database);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
