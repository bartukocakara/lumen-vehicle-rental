<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use App\Helpers\Log\LogActivity;

class IpMiddleware
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
        $requestIp = LogActivity::getIp();
        $whitelist = DB::table("ip_whitelist")->select("ip")->pluck("ip")->toArray();
        if (!in_array($requestIp, $whitelist))
        {
            return response()->json(['your ip address is not valid.']);
        }

        return $next($request);
    }
}
