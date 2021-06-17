<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    // 'google' => [
    //     'client_id' => env('GOOGLE_ID'),
    //     'client_secret' => env('GOOGLE_SECRET'),
    //     'redirect' => env('APP_URL').'/google/callback',
    // ],
    'google' => [
        'client_id' => '304080545845-46kc9rnbgmitfsj2oj2j22v54n2c5q11.apps.googleusercontent.com',
        'client_secret' => '9A6wx0r9o59rZsUmetYrLH7_',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_ID'),
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect' => env('APP_URL').'/facebook/callback',
    ],
    'stripe' => [
        'secret' => 'your-stripe-key-here',
    ],

];
