<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class UserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$user = User::where('email', $request->get('email'))->first();

        if (is_null($user)) {
        	return $next($request);
        }

        if(!$user->isVerified()) {
        	return redirect()->back()->withErrors(['message' => 'Account is not yet verified. Please check your email.']);
        }

        return $next($request);
    }
}
