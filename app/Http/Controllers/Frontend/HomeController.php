<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $foods = Food::all();
        return view('frontend.index', compact('foods'));
    }

    public function foodSearch(Request $request){

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

                    foreach ($foods as $food) {

                        $type = $food->type->name;
                        $output .= "
                        <a href=\"#\" class=\"list-group-item list-group-item-action flex-column align-items-start py-4 px-4\">
                                    <div class=\"d-flex w-100 justify-content-between\">
                                        <div>
                                            <div class=\"d-flex w-100 align-items-center\">
                                                <img src=\"$food->image_url \" alt=\"Image placeholder\" class=\"avatar avatar-xs mr-2\">
                                                <h5 class=\"mb-1\">$type</h5>
                                            </div>
                                        </div>
                                        <small>$food->calorie KCAL</small>
                                    </div>
                                    <h4 class=\"mt-3 mb-1\">$food->name</h4>
                                    <p class=\"text-sm mb-0\">$food->description</p>
                                </a>
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
