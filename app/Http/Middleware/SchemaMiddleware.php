<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SchemaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $schema = 'educo';
        $data['schema'] = $schema;

        $request->user = (object)$data;
        Config::set('database.connections.pgsql.schema', $schema);

        return $next($request);
    }
}
