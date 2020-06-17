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

    public function statesList($code = null){

        $states = [
            'unknown' => 'unknown',
            'JHR' => 'Johor',
            'KDH' => 'Kedah',
            'KTN' => 'Kelantan',
            'MLK' => 'Melaka',
            'NSN' => 'Negeri Sembilan',
            'PHG' => 'Pahang',
            'PRK' => 'Perak',
            'PLS' => 'Perlis',
            'PNG' => 'Pulau Pinang',
            'SBH' => 'Sabah',
            'SWK' => 'Sarawak',
            'SGR' => 'Selangor',
            'TRG' => 'Terengganu',
            'KUL' => 'W.P. Kuala Lumpur',
            'LBN' => 'W.P. Labuan',
            'PJY' => 'W.P. Putrajaya',
        ];

        if(isset($code)){
            return $states[$code];
        }

        return  $states;
    }
}
