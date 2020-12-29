<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
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
        $user = auth()->user();
        if($user->email != 'ramonlima08@gmail.com'){
            return redirect('/');
        }
        
        //dd("estou aqui");
        return $next($request);
    }
}
