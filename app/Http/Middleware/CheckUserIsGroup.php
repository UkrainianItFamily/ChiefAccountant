<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserIsGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $mytime = Carbon::today()->toDateString();

        if (Auth::user() && $mytime >= Auth::user()->date_from and $mytime <= Auth::user()->date_to) {
            return $next($request);
        }

        return redirect('/')->withErrors(['error' => ['У вас нет доступа к этому разделу!']]);
    }
}
