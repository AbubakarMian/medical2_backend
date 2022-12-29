<?php

namespace App\Http\Middleware;

use App\Model\User_Permission;
use App\Model\Admin_url;
use App\Model\AdminUrlUserPermission;
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



        if (Auth::Check()) {
            if ($user->role_id == 1) {
                $response = $next($request);
                $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
                $response->headers->set('Pragma', 'no-cache');
                $response->headers->set('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
                return $response;

            } else {
                $route_name = \Request::route()->getName();
                $admin_url = Admin_url::get();

                $permission_granted = true;
                $request_type = '';

                foreach ($admin_url as $admin_u) {
                    $admin_url_details = json_decode($admin_u->details);

                    foreach($admin_url_details as $detail){
                        if ($detail->name == $route_name && $detail->need_permission === true) {
                            $permission_granted = false;
                            if(isset($detail->type)&&$detail->type === 'json'){
                                $request_type = 'json';
                            }
                        }
                    }
                }
                if (!$permission_granted) {
                    $user_permissions = AdminUrlUserPermission::where('user_id', $user->id)->get();

                    foreach ($user_permissions as $user_permission) {
                        $details = json_decode($user_permission->details);
                        foreach ($details as $d) {
                            if ($d->name == $route_name) {
                                $permission_granted = true;
                                break;
                            }
                        }
                        if ($permission_granted) {
                            break;
                        }
                    }
                }

                if ($permission_granted) {
                    $response = $next($request);

                    $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
                    $response->headers->set('Pragma', 'no-cache');
                    $response->headers->set('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
                    return $response;
                    // return redirect()->route($route_name);
                } else {
                    if($request_type == 'json'){
                        $res = new \stdClass();
                        $res->status = false;
                        $res->message = 'Sorry ! Access Denied';
                        return response()->json($res);
                    } else {
                        return redirect('admin/dashboard')->with('error', 'Sorry ! Access Denied');
                    }
                }
            }
        }
        else{
            return redirect('admin/login')->with('error', 'Wrong Login Details');
        }
    }
}

