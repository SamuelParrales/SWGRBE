<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,)
    {
        $user = Auth::user();
        if($user->profile_type != "App\Models\Offeror") abort(404);

        $offeror = $user->profile;
        $isBanned = $offeror->banned_at?true:false;

        if(!$isBanned) return $next($request);
        //is banned

        $ban = $offeror->bans()->latest()->first();
        $today = date("Y-m-d H:i:s");
        $bannedUntil = date("Y-m-d H:i:s", strtotime($ban->created_at.$ban->days. "day"));

        if($today<$bannedUntil) return redirect()->route('email.ban');

        $offeror->banned_at = null;
        $offeror->save();
        return $next($request);
    }
}
