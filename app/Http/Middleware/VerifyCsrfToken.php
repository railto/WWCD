<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
        if($this->app->runningInConsole() && $this->app->runningUnitTests()) {
            // do not run csrf validation during unit tests and console commands
            return;
        }
        return $next($request);
    }
}
