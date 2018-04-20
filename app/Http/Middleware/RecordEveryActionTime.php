<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Jobs\EveryAction;

class RecordEveryActionTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$action=null)
    {
        $response = $next($request);
        if (Auth::guard('wap')->check()){
            \Log::info($request->id);
            // 推送任务到队列
            $member = Auth::guard('wap')->user();
            dispatch(new EveryAction($action,$member));
        }
        return $response;
    }
}
