<?php
return [
    'enable' => env('START_IFRAME_TAB', true),
    'footer_setting' => [
        'copyright' => env('APP_NAME', ''),
        'app_version' => env('APP_VERSION', '')
    ],
    'cache' => env('IFRAME_TAB_CACHE', false),
    'dialog_area_width' => env('IFRAME_TAB_DIALOG_AREA_WIDTH', '50%'),
    'dialog_area_height' => env('IFRAME_TAB_DIALOG_AREA_HEIGHT', '90vh')
];
