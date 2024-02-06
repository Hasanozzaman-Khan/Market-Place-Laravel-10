<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // 'github' => [
    //     'client_id' => env('GITHUB_CLIENT_ID'),
    //     'client_secret' => env('GITHUB_CLIENT_SECRET'),
    //     'redirect' => env('GITHUB_REDIRECT_URL'),
    // ],

    'github' => [
        'client_id' => '4875ea44aae2220fde34',
        'client_secret' => '419beed10d145ad0aa1280c131f975d3a9eff059',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

    'facebook' => [
        'client_id' => '385178337492009',
        'client_secret' => 'd6b21bda80480d07e18038cd76d988d6',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
