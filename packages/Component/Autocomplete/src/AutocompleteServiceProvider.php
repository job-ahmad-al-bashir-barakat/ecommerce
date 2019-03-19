<?php

namespace Component\Autocomplete;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

/**
 * Class AutocompleteServiceProvider
 * @package Component\Autocomplete
 */
class AutocompleteServiceProvider extends ServiceProvider
{
    /**
     * Vendor name.
     *
     * @var string
     */
    protected $vendor   = 'Select2';

    /**
     * Package name.
     *
     * @var string
     */
    protected $package  = 'autocomplete';

    protected $namespace = 'Component\Autocomplete\Http\Controllers';

    protected $middleware;

    function __construct(\Illuminate\Foundation\Application $app)
    {
        parent::__construct($app);

        $this->registerConfig();
    }

    public function boot(Router $router)
    {
        $this->routeMiddleware();

        $this->registerRoute($router);

        $this->publishAutocomplete();
    }

    private function publishAutocomplete()
    {
        // publish config
        $this->publishes([
            __DIR__.'/Config/autocomplete.php' => config_path('autocomplete.php')
        ], 'config');

        // publish assets
        $this->publishes([
            __DIR__.'/Assets' => public_path('vendor/autocomplete'),
        ], 'public');
    }

    private function registerRoute(Router $router)
    {
        $router->group(
            [
                'prefix'     => "autocomplete",
                'namespace'  => $this->namespace,
                'middleware' => $this->middleware
            ],
            function () {
                Route::get('{model}', "AutocompleteController@autocomplete");
                Route::post('{model}', "AutocompleteController@store");
            });
    }

    private function routeMiddleware()
    {
        $this->middleware =  config('autocomplete.routeMiddleware');
    }

    protected function registerController()
    {
        // register our controller
        $this->app->make('Component\Autocomplete\Http\Controllers\AutocompleteController');
    }

    protected function registerHelper()
    {
        // add helper method to my project
        require_once('Helper/helpers.php');
    }

    protected function registerViews()
    {
        //register our view
        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'autocomplete');
    }

    protected function registerConfig()
    {
        if(!file_exists(base_path('config/autocomplete.php')))
            $this->mergeConfigFrom(__DIR__.'/Config/autocomplete.php' ,'autocomplete');

        if(!file_exists(base_path('config/autocompleteModels.php')))
            $this->mergeConfigFrom(__DIR__.'/Config/autocompleteModels.php' ,'autocompleteModels');
    }

    public function register()
    {
        $this->registerController();
        $this->registerHelper();
        $this->registerViews();
    }
}