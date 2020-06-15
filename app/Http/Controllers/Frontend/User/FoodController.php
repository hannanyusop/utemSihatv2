<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Food;

/**
 * Class HomeController.
 */
class FoodController extends Controller
{

    public function index()
    {
        $foods = Food::all();
        return view('frontend.user.food.index', compact('foods'));
    }
}
