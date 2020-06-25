<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\MealHasFood;
use App\Models\Type;
use Illuminate\Http\Request;


class FoodController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('name')){
            $foods = Food::where('name', 'LIKE', "%$request->name%")
                ->paginate(20);

        }else{
            $foods = Food::paginate(20);
        }
        return view('backend.food.index', compact('foods'));
    }

    public function add(){

        $types = Type::pluck('name', 'id');
        return view('backend.food.add', compact('types'));

    }

    public function insert(Request $request){

        $food = new Food();
        $food->type_id = $request->type_id;
        $food->name = $request->name;
        $food->image_url = $request->image_url;
        $food->description = $request->description;
        $food->calorie = $request->calorie;

        if($food->save()){
            return redirect()->route('admin.auth.food.index')->withSuccessMessage('Food inserted successfully!');
        }else{
            return redirect()->route('admin.auth.food.index')->withErrorMessage('Failed to insert food!');
        }
    }

    public function view($id){

        $food = Food::findOrFail($id);

        return view('backend.food.view', compact('food'));
    }

    public function edit($id){

        $food = Food::findOrFail($id);
        $types = Type::pluck('name', 'id');

        return view('backend.food.edit', compact('food', 'types'));
    }

    public function update(Request $request, $id){

        $food = Food::findOrFail($id);
        $food->type_id = $request->type_id;
        $food->name = $request->name;
        $food->image_url = $request->image_url;
        $food->description = $request->description;
        $food->calorie = $request->calorie;

        if($food->save()){
            return redirect()->route('admin.auth.food.view', $id)->withSuccessMessage('Food updated successfully!');
        }else{
            return redirect()->route('admin.auth.food.view', $id)->withErrorMessage('Failed to update food!');
        }
    }

    public function delete($id){

        $food = Food::findOrFail($id);

        $mhf = MealHasFood::where('food_id', $id)->first();

        if($mhf){

            $food->delete();
            return redirect()->route('admin.auth.food.index')->withSuccessMessage('Food deleted successfully!');

        }else{
            return redirect()->route('admin.auth.food.view', $id)->withErrorMessage('Food can\'t be deleted because already in used!');
        }
    }

}
