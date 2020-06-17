<?php

namespace App\Http\Middleware;

use App\Models\Auth\User;
use Closure;

class checkInfo
{

    public function handle($request, Closure $next)
    {
        $user = User::find(auth()->user()->id);
        if ($user->bmi == 0) {
            return redirect()->route('frontend.user.account')->withFlashInfo('You need to update your detail first!');
        }

        return $next($request);
    }
}
