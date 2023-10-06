<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Nette\Utils\Json;


class LogSqlQuery
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|JsonResponse|Response
     */
    public function handle(Request $request, Closure $next)
    {
        $showQueries = $request->header('X-Show-Queries', false);

        if ($showQueries) {
            DB::enableQueryLog();
        } else {
            DB::disableQueryLog();
        }

        return $next($request);
    }
}
