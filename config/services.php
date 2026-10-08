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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'site_leads' => [
        'url' => env('SITE_LEADS_WEBHOOK_URL', 'https://svergazov.ru/leads/api/webhook'),
        'secret' => env('SITE_LEADS_WEBHOOK_SECRET'),
        'email' => env('SITE_LEADS_EMAIL', 'info@bee-cars.ru'),
        'from' => env('SITE_LEADS_FROM', env('MAIL_FROM_ADDRESS', 'no-reply@bee-cars.ru')),
    ],

];
