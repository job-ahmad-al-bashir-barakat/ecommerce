<?php

namespace Component\Form;

use Illuminate\Support\ServiceProvider;
use Component\Form\Builder\FormBuilder;
use Illuminate\Routing\Router;

/**
 * Class AutocompleteServiceProvider
 * @package Component\Autocomplete
 */
class FormServiceProvider extends ServiceProvider
{
    /**
     * Vendor name.
     *
     * @var string
     */
    protected $vendor   = 'form';

    /**
     * Package name.
     *
     * @var string
     */
    protected $package  = 'form';

    function __construct(\Illuminate\Foundation\Application $app)
    {
        parent::__construct($app);

        $this->registerConfig();
    }

    public function boot(Router $router)
    {
        $this->registerViews();
    }

    /**
     * register our singleton instance
     */
    protected function registerSingleton()
    {
        $this->app->singleton('_Form', function ($app) {
            return new FormBuilder();
        });
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'form');
    }

    protected function registerConfig()
    {
        if(!file_exists(base_path('config/form.php')))
            $this->mergeConfigFrom(__DIR__.'/Config/form.php' ,'form');

        if(!file_exists(base_path('config/tooltip.php')))
            $this->mergeConfigFrom(__DIR__.'/Config/tooltip.php' ,'tooltip');
    }

    public function register()
    {
        $this->registerSingleton();
    }


    public function provides()
    {
        return ['_Form', 'Component\Form\Builder\FormBuilder'];
    }
}