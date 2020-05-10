<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
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
        $roles = $this->getRequiredRoleForRoute($request->route());

        if(!empty($request->user())){
            if($request->user()->hasRole($roles) || !$roles)
            {
                return $next($request);
            }
            /*if($request->user()->hasAnyRole($roles) || !$roles)
            {
                return $next($request);

            }*/
        }else{
            return redirect()->to('login');
        }

        return response()->view('errors.401');
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
