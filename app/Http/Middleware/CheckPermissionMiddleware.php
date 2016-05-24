<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission,$mark = false)
    {
        // 更改状态权限
        if ($mark) {
            if (! $request->user()->canOne([config('admin.permissions.'.$permission.'.audit'),config('admin.permissions.'.$permission.'.undo'),config('admin.permissions.'.$permission.'.trash')])) {
                abort(500,trans('errors.permissions'));
            }
        }else{
            if (! $request->user()->can($permission)) {
                abort(500,trans('errors.permissions'));
            }
        }

        return $next($request);
    }
}
