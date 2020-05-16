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
        $roles  =   $request->user()->role->name;

        if(!empty($request->user())){
            /*if($request->user()->hasRole($roles) || !$roles)
            {
                return $next($request);
            }*/
            $routeName  =   $request->route()->getName();
            $returnData =   $request->user()->hasPermission($roles,$routeName);
            $this->setDataToUser($request,$request->user(),$returnData,$route_valid=true);
            if(!empty($returnData) && $returnData['success'])
            {
                return $next($request);
            }
            else{
                $this->setDataToUser($request,$request->user(),$returnData,$route_valid=false);
                return response()->view('errors.401');
            }
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
    function setDataToUser($request,$user,$returnData,$route_valid=false)
    {

        $user->access    =   [
            'role'          =>  $returnData['role'],
            'permission'    =>  $returnData['permission'],
            'currentRoute'  =>  $returnData['routeName'],
            'route_valid'   =>  $route_valid,
        ];
        $request->merge([
            'user' => $user
        ]);
        $request->setUserResolver(function () use ($user) {
            return $user;
        });
    }
}
