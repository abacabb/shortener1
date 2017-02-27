<?php
/**
 * Created by PhpStorm.
 * User: abaca
 * Date: 18.10.2016
 * Time: 21:43
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;

class Language
{
    public function handle(Request $request, \Closure $next, $force = 'X')
    {
        return $next($request);
    }
}