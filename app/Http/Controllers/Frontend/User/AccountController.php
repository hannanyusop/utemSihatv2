<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Account\UpdatePasswordRequest;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('frontend.user.account.index2', compact('user'));
    }

    public function update(Request $request){

        $user = User::find(auth()->user()->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = ($request->gender == "M")? "M" : "F";
        $user->age = $request->age;
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->bmi = $request->weight/(POW($request->height/100, 2));


        if($user->save()){
            return redirect()->route('frontend.user.account')->withFlashSuccess("Information updated successfully!");
        }else{
            return redirect()->route('frontend.user.account')->withFlashDanger("Failed to update information!");
        }

    }

    public function location(){


        $ip = $_SERVER['REMOTE_ADDR'];

//        dd(geoip('23.220.99.255'));

        $user = User::find(auth()->user()->id);
        $states = $this->statesList();
        $old = $states[$user->state];

        return view('frontend.user.account.location', compact('user', 'old'));
    }

    public function locationUpdate(Request $request){

        $states = $this->statesList();

        $code = "UNKNOWN";
        $name = $request->name;
        foreach ($states as $key => $state){
            if (strpos($name, $state) !== false) {
                $code = $key;
            }
        }

        $user = User::find(auth()->user()->id);
        $user->lon = $request->lon;
        $user->lat = $request->lat;
        $user->state = $code;

        if($user->save()){
            return redirect()->route('frontend.user.account.location')->withFlashSuccess("Location updated successfully!");
        }else{
            return redirect()->route('frontend.user.account.location')->withFlashDanger("Failed to update location!!");
        }


    }

    public function updatePasswordForm(){
        return view('frontend.user.account.update-password');
    }

    public function updatePassword(UpdatePasswordRequest $request){

        $user = auth()->user();


        if (Hash::check($request->password, $user->password)) {

            $user->password = $request->new_password;
            $user->save();
            return redirect()->route('frontend.user.dashboard')->withFlashSuccess('Password changed!');

        }else{
            return redirect()->route('frontend.user.account.update-password-form')->withFlashWarning('Old password not match!');
        }


    }
}
