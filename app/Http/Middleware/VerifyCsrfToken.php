<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [

        //
    ];
    public function handle($request, Closure $next)
    {
        ini_set('max_input_vars', '10000'); // Menambah limit input
        return parent::handle($request, $next);
    }
}
