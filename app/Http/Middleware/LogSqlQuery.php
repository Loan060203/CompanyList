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
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
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
