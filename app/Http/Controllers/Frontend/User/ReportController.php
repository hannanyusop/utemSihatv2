<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Carbon\Carbon;

/**
 * Class DashboardController.
 */
class ReportController extends Controller
{

    public function index()
    {
        //past 7 days

        $calNeed = 0.00;
        if(auth()->user()->gender == "M"){

            $calNeed = (13.75*auth()->user()->weight)+(5*auth()->user()->height)-(6.76*auth()->user()->age)+66;

        }else{
            $calNeed = (9.56*auth()->user()->weight)+(1.85*auth()->user()->height)-(4.68*auth()->user()->age)+655;
        }

        $today = Carbon::now()->addDays(-7);
        $day = 0;
        $dates = array();
        $data = array();
        while ($day <= 7){
            $date = $today->format('Y-m-d');

            array_push($dates, $date);

            $cal = Meal::where('date', $date)
                ->where('user_id', auth()->user()->id)
                ->sum('ttl_calorie');

            array_push($data, $cal);
            $today->addDays(1);
            $day++;
        }


        return view('frontend.user.report.index', compact('calNeed', 'dates', 'data'));
    }
}
