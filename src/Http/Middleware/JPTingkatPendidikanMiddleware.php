<?php namespace Bantenprov\JPTingkatPendidikan\Http\Middleware;

use Closure;

/**
 * The JPTingkatPendidikanMiddleware class.
 *
 * @package Bantenprov\JPTingkatPendidikan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPTingkatPendidikanMiddleware
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
        return $next($request);
    }
}
