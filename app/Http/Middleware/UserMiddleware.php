<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cache;
use App\Models\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role != '1') {
            return redirect()->back();
        }

        if(Auth::check() && Auth::user()->isban == 0){
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'banned' => 'Your account has been banned',
            ]);
        }

        if(Auth::check()){
            $expiredTime = Carbon::now()->addSeconds(30);
            Cache::put('isOnline'. Auth::id(), true, $expiredTime);
            User::where('id', Auth::id())->update(['last_seen' => Carbon::now()]);
        }

        return $next($request);


    }
}
