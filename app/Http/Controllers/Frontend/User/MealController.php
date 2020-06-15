<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Meal;
use App\Models\MealHasFood;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Html\Elements\Select;

/**
 * Class HomeController.
 */
class MealController extends Controller
{

    public function today(){

        $today = Carbon::today();
        $meals = Meal::where('date', $today->format('Y-m-d'))
            ->where('user_id', auth()->user()->id)
            ->get();

        $mealsList = $this->getMealType();
        return view('frontend.user.meal.today', compact('mealsList', 'meals'));
    }

    public function todayView($id){


        $foods = Food::all();

        $today = Carbon::today()->format('Y-m-d');
        $meal = Meal::where('date', $today)
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->with('foods')
            ->firstOrFail();

        return view('frontend.user.meal.today-view', compact('meal', 'today', 'foods'));
    }

    public function todayAddItem(Request $request, $id){

        $today = Carbon::today()->format('Y-m-d');
        $meal = Meal::where('date', $today)
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->with('foods')
            ->firstOrFail();

        $food = Food::findOrFail($request->food_id);

        $data = [
            'name' => $food->name,
            'calorie' => $food->calorie,
            'description' => $food->description,
        ];
        $mhf = new MealHasFood();
        $mhf->meal_id = $meal->id;
        $mhf->food_id = $request->food_id;
        $mhf->data = json_encode($data);

        $meal->increment('ttl_calorie', $food->calorie);

        if($mhf->save()){
            return redirect()->route('frontend.user.meal.today-view', $meal->id)->withFlashSuccess("Item successfully added to  $meal->meal_type_alt.");
        }else{
            return redirect()->route('frontend.user.meal.today-view', $meal->id)->withFlashDanger("Failed to add item into $meal->meal_type_alt!");
        }

    }

    public function todayRemoveItem($id, $item_id){

        $today = Carbon::today()->format('Y-m-d');
        $meal = Meal::where('date', $today)
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->firstOrFail();

        $mhf = MealHasFood::findOrFail($item_id);

        $food = Food::findOrFail($mhf->food_id);
        $meal->decrement('ttl_calorie', $food->calorie);

        if($mhf->delete()){
            return redirect()->route('frontend.user.meal.today-view', $meal->id)->withFlashSuccess("Item successfully remove from  $meal->meal_type_alt.");
        }else{
            return redirect()->route('frontend.user.meal.today-view', $meal->id)->withFlashDanger("Failed to remove item from $meal->meal_type_alt!");
        }
    }

    public function addMealGroup(Request $request){

        $today = Carbon::today();

        $meal = new Meal();
        $meal->user_id = auth()->user()->id;
        $meal->meal_type = 0;
        $meal->meal_type_alt = $request->meal_type;
        $meal->notes = $request->notes;
        $meal->date =  $today->format('Y-m-d');
        $meal->time =  $today->format('h:i:s');

        if($meal->save()){
            return redirect()->route('frontend.user.meal.today')->withFlashSuccess("Meals $request->meal_type crated successfully");
        }else{
            return redirect()->route('frontend.user.meal.today')->withFlashDanger("Failed to create $request->meal_type!");
        }
    }

}
