<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;


class AnalyticController extends Controller
{

    public function index()
    {
        // < 8.5 underweight
        //18.5 >= 24.9 normal
        //25.0  - 29.9 overweight
        //30.0 .. Obese

        //< 14 child
        //15-24 youth
        //25-64 Adult
        //65 > Senior

        $childRaw = "age <= 14";
        $youthRaw = "age BETWEEN 15 AND 24";
        $adultRaw = "age BETWEEN 25 AND 64";
        $seniorRaw = "age >= 65";

        $maleRow = "gender = 'M'";
        $femaleRow = "gender = 'F'";

        $female = array();
        array_push($female, User::where('bmi', '<', 18.5)->where('gender', 'F')->count());
        array_push($female, User::whereBetween('bmi', [18.6, 24.9])->where('gender', 'F')->count());
        array_push($female, User::whereBetween('bmi', [25.0, 29.9])->where('gender', 'F')->count());
        array_push($female, User::where('bmi', '>', 30.0)->where('gender', 'F')->count());

        $male = array();
        array_push($male, User::where('bmi', '<', 18.5)->where('gender', 'M')->count());
        array_push($male, User::whereBetween('bmi', [18.6, 24.9])->where('gender', 'M')->count());
        array_push($male, User::whereBetween('bmi', [25.0, 29.9])->where('gender', 'M')->count());
        array_push($male, User::where('bmi', '>', 30.0)->where('gender', 'M')->count());

        //
        $all = array();
        array_push($all, User::where('bmi', '<', 18.5)->count());
        array_push($all, User::whereBetween('bmi', [18.6, 24.9])->count());
        array_push($all, User::whereBetween('bmi', [25.0, 29.9])->count());
        array_push($all, User::where('bmi', '>', 30.0)->count());


        $data = [
            'all' => $all,
            'male' => $male,
            'female' => $female
        ];

        return view('backend.report.index', compact('data'));
    }

    public function states(){

        $states = $this->statesList();

        $data = [];

        foreach ($states as $key => $state){


            $all = array();
            array_push($all, User::where('bmi', '<', 18.5)->where('state', $key)->count());
            array_push($all, User::whereBetween('bmi', [18.6, 24.9])->where('state', $key)->count());
            array_push($all, User::whereBetween('bmi', [25.0, 29.9])->where('state', $key)->count());
            array_push($all, User::where('bmi', '>', 30.0)->where('state', $key)->count());

            $data[$state] = $all;
        }

        $statesKey = array_values($states);

        return view('backend.report.states', compact('data', 'states', 'statesKey'));
    }
}
