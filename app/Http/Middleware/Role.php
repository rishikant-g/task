<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Role
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
        $user = Auth::user();
       
        if($user->roles[0]->role_name =='admin'){
            return redirect('/admin');
        }else if($user->roles[0]->role_name =='clerk'){
            return redirect('/clerk');
        }else if($user->roles[0]->role_name =='inventory manager'){
            return redirect('/inventory-manager');
        }else if($user->roles[0]->role_name =='order manager'){
            return redirect('/order-manager');
        }else if($user->roles[0]->role_name =='customer'){
            return redirect('/customer');
        }
        return $next($request);
    }
}
