<?php

namespace App\Http\Middleware;

use App\Model\User_Permission;
use Closure;
use Illuminate\Support\Facades\Auth;


class Role_Middleware
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
        $user =Auth::user();
        if($user->role_id == 1){
            $response = $next($request);
            $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
            $response->headers->set('Pragma','no-cache');
            $response->headers->set('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
            return $response;
           
        }
        $route_name = \Request::route()->getName();
       
        if(Auth::Check()){

                $user_permission = User_Permission::where('user_id',$user->id);
                $user_permission = $user_permission->where(function ($u_p) use ($route_name){
                 $u_p->where('can_view',$route_name)
                ->orWhere('can_create',$route_name)
                ->orWhere('can_save',$route_name)
                ->orWhere('can_edit',$route_name)
                ->orWhere('can_update',$route_name)
                ->orWhere('can_delete',$route_name);

                })->get();

                if($user_permission->count() > 0){
                $response = $next($request);

                $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
                $response->headers->set('Pragma','no-cache');
                $response->headers->set('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
                return $response;
                // return redirect()->route($route_name);
                }
                else{
                    return redirect('admin/dashboard')->with('error', 'Sorry ! Access Denied');;
                }
        }
        else{
            return redirect('admin/login')->with('error', 'Wrong Login Details');
        }
    }
}
