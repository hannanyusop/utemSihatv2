<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */
class FoodController extends Controller
{

    public function index(){

        return view('frontend.user.food.index');
    }

    public function search(Request $request){

        if($request->ajax()){

            $query = $request->get('query');
            $output = "";
            $row = 0;


            if(str_replace(' ', '', $query) == ""){

                $output .="<p class='text-warning font-weight-bold text-center'>Please insert any keyword</p>";

            }else{

                $foods = Food::where('name', 'LIKE', "%$query%")
                    ->get();

                if($foods->count() > 0){

                    $row = $foods->count();

                    foreach($foods as $food) {

                        $type = $food->type->name;

                        $output .= "
                        <div class=\"row align-items-center mb-3\">
                                <div class=\"col-auto\">
                                    <!-- Avatar -->
                                    <a href=\"#\" class=\"avatar avatar-xl\">
                                        <img alt=\"Image placeholder\" src=\"$food->image_url\">
                                    </a>
                                </div>
                                <div class=\"col ml--2\">
                                    <h4 class=\"mb-0\">
                                        <a href=\"#!\">$food->name </a>
                                    </h4>
                                    <small>$food->calorie KCAL</small>
                                </div>
                                <div class=\"col-auto\">
                                    <button type=\"button\" class=\"btn btn-sm btn-primary\">View</button>
                                </div>
                            </div>
                        ";
                    }

                }else{
                    $output.= "<p class='text-dark font-weight-bold text-center'>No Food found for name '$query'</p>";
                }

            }

            $data = array(
                'data'  => $output,
                'row'  => $row." total food(s)"
            );

            echo json_encode($data);

        }

    }

}
