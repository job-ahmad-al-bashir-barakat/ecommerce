<?php
namespace App\Http\ViewComposer;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Modules\Utilities\Entities\Lang;
use Modules\Utilities\Entities\ControlMenu;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GlobalComposer
{
    public function compose(View $view)
    {
        $view->with([
            'lang' => str_replace('_', '-', app()->getLocale()),
            'dir'  => 'ltr',
        ]);
    }
}