<?php

namespace Component\Form;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
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
        //
    }

    protected function registerHelper()
    {
        // add helper method to my project
        require_once('Helper/helpers.php');
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
        $this->registerHelper();
    }
}