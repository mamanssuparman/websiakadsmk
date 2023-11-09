<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [

        "admin/categoryarticle/store",
        "admin/categoryarticle/activenon",
        "admin/categoryarticle/*/update",
        "admin/video/save-data",
        "admin/video/activenon",
        "admin/video/*/update",
        "/admin/gallery/store",
        "/admin/gallery/activenon",
        '/admin/gallery/*/update'
    ];
}
