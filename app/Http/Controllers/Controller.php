<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function upload($file) {

        $file = request()->file($file,$_FILES[$file] ?? null);

        if($file)
        {
            \Storage::makeDirectory("public\\image");

            \Storage::disk('public')->put("image\\".$file->getClientOriginalName(),  \File::get($file));

            return $file->getClientOriginalName();
        }
        else
        {
            return null;
        }
    }
}
