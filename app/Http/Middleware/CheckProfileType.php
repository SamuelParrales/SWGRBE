<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfileType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$profiles)
    {

        $profileCurrent = Auth::user()->profile_type;
        foreach ($profiles as $profile)
        {
            $profile =  "App\Models\\". $profile;
            if($profile == $profileCurrent)
            {
                return $next($request);
            }
        }
       abort(403);

    }
}
