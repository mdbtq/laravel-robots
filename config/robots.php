<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disallowed Paths
    |--------------------------------------------------------------------------
    |
    | Paths that should be disallowed in robots.txt when the application
    | is running in a production environment.
    |
    */

    'disallow' => [],

    /*
    |--------------------------------------------------------------------------
    | Sitemap URL
    |--------------------------------------------------------------------------
    |
    | When set, a Sitemap directive will be appended to the robots.txt output.
    | Set to null to omit the directive entirely.
    |
    */

    'sitemap' => '/sitemap.xml',

    /*
    |--------------------------------------------------------------------------
    | Block Non-Production Environments
    |--------------------------------------------------------------------------
    |
    | When true, non-production environments will serve "Disallow: /"
    | to prevent search engines from indexing staging or development sites.
    |
    */

    'block_non_production' => true,

];
