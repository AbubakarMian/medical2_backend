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
        // dd( $user);
        if(Auth::Check()){

        if($user->role_id == 1){
            $response = $next($request);
            $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
            $response->headers->set('Pragma','no-cache');
            $response->headers->set('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
            return $response;

        }
    }
        else{
        $route_name = \Request::route()->getName();

        if(Auth::Check()){
                $admin_url = Admin_url::get();
                $admin_url_details = json_decode($admin_url->details);
                $permission_granted = false;

                foreach($admin_url_details as $d){
                    if(!$d->need_permission){
                        $permission_granted = true;
                    }
                }
                if(!$permission_granted){
                    $user_permissions = AdminUrlUserPermission::where('user_id',$user->id)->get();

                    foreach($user_permissions as $user_permission){
                        $details = json_decode($user_permission->details);
                        foreach($details as $d){
                            if($d->name == $route_name){
                                $permission_granted = true;
                                break;
                            }
                        }
                        if($permission_granted){
                            break;
                        }
                    }
                }

                if($permission_granted){
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
}
