<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'         => CSRF::class,
        'toolbar'      => DebugToolbar::class,
        'honeypot'     => Honeypot::class,
        'invalidchars' => InvalidChars::class,
        'secureheaders'=> SecureHeaders::class,
        'cors'         => Cors::class,
        'forcehttps'   => ForceHTTPS::class,
        'pagecache'    => PageCache::class,
        'performance'  => PerformanceMetrics::class,

        // Your custom filters
        'auth'         => \App\Filters\AuthGuard::class,
    ];

    /**
     * List of filter aliases that work on
     * a particular HTTP method.
     *
     * @var array<string, list<string>>
     */
    public array $methods = [
        // e.g. 'post' => ['csrf']
    ];

    /**
     * List of filter aliases that should run
     * before or after a particular URI pattern.
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [
        'auth'       => ['before' => ['', 'vote/*']],
        'auth:admin' => ['before' => ['admin/*']],
    ];

  
}