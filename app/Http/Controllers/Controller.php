<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function class()
    {
        $file = file_get_contents('https://analisi.transparenciacatalunya.cat/resource/rhpv-yr4f.json');

        $data = json_decode($file, false);

        var_dump($data);

    }

}
