<?php
return [
    'enable' => env('START_IFRAME_TAB', true),
    'footer_setting' => [
        'copyright' => env('APP_NAME', ''),
        'app_version' => env('APP_VERSION', '')
    ],
    'cache' => env('IFRAME_TAB_CACHE', false)
];
