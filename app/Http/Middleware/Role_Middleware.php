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
        $route_name = \Request::route()->getName();
       
        if(Auth::Check()){
            dd($user->id);
            // dd( $route_name);
            if($user->role_id == '1'){
                // dd( $route_name);

                $user_permission = User_Permission::where('user_id',$user->id)
                ->where(function ($u_p) use ($route_name){
                 $u_p->where('can_view',$route_name)
                ->orwhere('can_create',$route_name)
                ->orwhere('can_save',$route_name)
                ->orwhere('can_save',$route_name)
                ->orwhere('can_edit',$route_name)
                ->orwhere('can_update',$route_name)
                ->orwhere('can_delete',$route_name);

                });
               
             

                if($user_permission){
                 dd('sasa');
                $response = $next($request);

                $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
                $response->headers->set('Pragma','no-cache');
                $response->headers->set('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
                return $response;
                // return redirect()->route($route_name);
                }
                else{

                    return redirect('admin/dashboard');
                }

              
            }

            else{
                return redirect('admin/login')->with('error', 'Wrong Login Details');
            }
        }
        else{
            return redirect('admin/login')->with('error', 'Wrong Login Details');
        }
    }
}
