<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->isAdmin()) {
            abort(403, 'फक्त अ‍ॅडमिन याच पेजमध्ये प्रवेश करू शकतात.');
        }

        return $next($request);
    }
}