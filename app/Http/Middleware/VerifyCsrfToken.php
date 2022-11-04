<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        'api/login',
        'api/register',
        'api/meal/store',
        'api/meal/update/{meal}',
        // 'api/*'
    ];
}
