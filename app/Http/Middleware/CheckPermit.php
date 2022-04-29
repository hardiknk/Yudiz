<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

class CheckPermit
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
        // echo 'hii';
        $routeName = Route::currentRouteName();
        // dd($routeName); // admin.custoemrs.edit
        $method = substr($routeName, strrpos($routeName, '.') + 1);
        // dd(strrpos($routeName, '.') + 1);
        // dd($method); //edit 
        $routeName = substr($routeName, 0, strrpos($routeName, '.'));
        // dd($routeName); //admin.customors
        $method = ($method != '' ? $method : $routeName);
        $permission = '';
        // dd($method); edit 

        try {
            if (config('utility.caching') && Redis::exists('active.routes.' . $routeName)) {
                $role = json_decode((Redis::get('active.routes.' . $routeName)));
            } else {
                $role = Role::where('route', 'like', $routeName . '%')->first();
                if (config('utility.caching')) Redis::set('active.routes.' . $routeName, json_encode($role));
            }
        } catch (\Exception $ex) {
            $role = \Cache::remember('active.routes.' . $routeName, (60 * 60), function () use ($routeName) {
                return $role = Role::where('route', 'like', $routeName . '%')->first();
            });
        }


        // Permissions 
        $access = ['index', 'listing', 'showSetting', 'change-setting', 'trashed', 'trasheddata'];
        $add = ['store', 'create'];
        $update = ['edit', 'update'];
        $view = ['show'];
        $delete = ['destroy'];

        if (in_array($method, $access)) $permission = 'access';
        elseif (in_array($method, $add)) $permission = 'add';
        elseif (in_array($method, $update)) $permission = 'edit';
        elseif (in_array($method, $delete)) $permission = 'delete';
        elseif (in_array($method, $view)) $permission = 'view';
        // dd($permission); //edit
        if (!empty($permission)) {
            $current_permission = unserialize($request->user()->permissions);
            // dd($current_permission); //get the all user current permission 
            // dd($role->id); //only 12 for the customer section
            if (
                array_key_exists($role->id, $current_permission)
                && !empty($current_permission[$role->id]['permissions'])
                && in_array($permission, explode(',', $current_permission[$role->id]['permissions']))
            )
                // dd($permission);
                return $next($request);
        }
        return redirect('admin/dashboard');
    }
}
