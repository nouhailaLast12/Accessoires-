<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Allowed CORS Paths
    |--------------------------------------------------------------------------
    |
    | Here you can specify the paths for which CORS should be enabled. 
    | Use '*' to allow any path. You can define more specific paths as needed.
    |
    */
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Adjust the paths to fit your needs
    'paths' => ['api/*', 'storage/*'],
    'allowed_origins' => ['http://localhost:3000'],


    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Here you can specify which HTTP methods are allowed for cross-origin
    | requests. You can use '*' to allow all methods, or specify individual
    | methods like 'GET', 'POST', etc.
    |
    */
    'allowed_methods' => ['*'], // Allow all methods

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | This option defines the origins that are allowed to make cross-origin
    | requests. Use '*' to allow all origins, but for security reasons, 
    | you should restrict it in a production environment.
    |
    */
    'allowed_origins' => ['*'], // Allow all origins (should be restricted in production)

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins Patterns
    |--------------------------------------------------------------------------
    |
    | If you want to match origins using a pattern, you can define those
    | patterns here. For example, you can use 'http://*.example.com' to
    | match any subdomain of example.com.
    |
    */
    'allowed_origins_patterns' => [], // You can define patterns if needed, otherwise leave empty

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | This option specifies which headers are allowed when making a cross-origin
    | request. You can use '*' to allow all headers or specify individual ones.
    |
    */
    'allowed_headers' => ['*'], // Allow all headers

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | You can specify which headers should be exposed to the browser.
    | This is useful if you want the browser to have access to specific headers
    | that aren't by default exposed.
    |
    */
    'exposed_headers' => [], // Leave empty if no custom exposed headers are needed

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | This option defines the maximum amount of time the preflight request
    | can be cached in seconds. Set it to 0 if you don't want to cache
    | the preflight request.
    |
    */
    'max_age' => 0, // Set to 0 to not cache preflight requests

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Set this to true if your CORS requests should support credentials (cookies,
    | authorization headers, etc.).
    |
    */
    'supports_credentials' => false, // Set to true if you need to support credentials like cookies
];
