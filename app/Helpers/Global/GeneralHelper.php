<?php

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            }

            return 'frontend.user.dashboard';
        }

        return 'frontend.index';
    }
}


function getCalNeeded(int $user_id){

    $user = \App\Models\Auth\User::find(auth()->user()->id);
    if($user->gender == "M"){

        $calNeed = (13.75*$user->weight)+(5*$user->height)-(6.76*$user->age)+66;

    }else{
        $calNeed = (9.56*$user->weight)+(1.85*$user->height)-(4.68*$user->age)+655;
    }

    return $calNeed;
}
