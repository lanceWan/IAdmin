<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use ChatRepository;
class UserTokenMiddleware
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
        if (Auth::user()->rong_token) {
            view()->share('rong_token', Auth::user()->rong_token);
            return $next($request);
        }else{
            $token = ChatRepository::getToken(Auth::user()->id,Auth::user()->name,Auth::user()->image);
            $token = json_decode($token);
            if ($token->code == 200) {
                $user = User::find(Auth::user()->id);
                $user->rong_token = $token->token;
                if ($user->save()) {
                    view()->share('rong_token', $token->token);
                    return $next($request);
                }
                abort(500);
            }
            abort(500);
        }
    }
}
