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
        $today = Carbon::today();
        $calNeed = 0.00;
        if(auth()->user()->gender == "M"){

            $calNeed = (13.75*auth()->user()->weight)+(5*auth()->user()->height)-(6.76*auth()->user()->age)+66;

        }else{
            $calNeed = (9.56*auth()->user()->weight)+(1.85*auth()->user()->height)-(4.68*auth()->user()->age)+655;
        }

        $todayCal = Meal::where('date', $today->format('Y-m-d'))
            ->where('user_id', auth()->user()->id)
            ->sum('ttl_calorie');

        $used = number_format((float)$todayCal/$calNeed*100, 2, '.', '');;

        return view('frontend.user.dashboard', compact('calNeed', 'todayCal', 'used'));
    }
}
