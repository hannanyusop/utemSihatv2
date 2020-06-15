<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller.
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getMealType(int $type = null){

        $types = array("Breakfast","Tea", "Lunch", "High Tea", "Dinner", "Supper");

       if(is_null($type)){
           return $types;
       }

       return $types;
    }
}
