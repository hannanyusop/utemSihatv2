<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Carbon\Carbon;
use Spatie\Html\Elements\Select;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    public function index()
    {


        $calNeed = getCalNeeded(auth()->user()->id);

        //check if user taken more cal in streak 3 days
        $today = Carbon::now()->addDays(-7);
        $day = 0;
        $dates = array();
        $streak = array();

        while ($day <= 7){
            $date = $today->format('Y-m-d');

            array_push($dates, $today->format('d-M'));

            $cal = Meal::where('date', $date)
                ->where('user_id', auth()->user()->id)
                ->sum('ttl_calorie');

            $exceed = ($cal >= $calNeed)? 1 : 0;

            array_push($streak, $exceed);
            $today->addDays(1);
            $day++;
        }

        $occurences = array_count_values($streak);
        $countExceed = (isset($occurences[1])) ? $occurences[1] : 0 ; //prevent undefind index
        $alert = ($countExceed > 3)? true : false;
        
        $todayCal = Meal::where('date', Carbon::now()->format('Y-m-d'))
            ->where('user_id', auth()->user()->id)
            ->sum('ttl_calorie');

        $used = number_format((float)$todayCal/$calNeed*100, 2, '.', '');

        $today = Carbon::today();
        $meals = Meal::where('date', $today->format('Y-m-d'))
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('frontend.user.dashboard', compact('calNeed', 'todayCal', 'used', 'meals', 'alert'));
    }
}
