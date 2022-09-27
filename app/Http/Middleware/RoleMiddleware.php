<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;

class RoleMiddleware
{
    use ApiResponseTrait;

    private const ADMIN_ROLE = 'ADMIN';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isAdmin = DB::table('users as u')
                    ->join('user_roles as ur', 'u.id', '=', 'ur.user_id')
                    ->join('roles as r', 'ur.role_id', '=', 'r.id')
                    ->where('u.id', auth()->user()->id)
                    ->where('r.code', self::ADMIN_ROLE)
                    ->select('r.code')
                    ->first();
        return $isAdmin != null ? $this->permissionFailedResponse() : $next($request);
    }
}
