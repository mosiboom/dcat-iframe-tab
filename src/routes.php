<?php

use JasperMosiboom\DcatIframeTab\Controllers\IframeController;

if (config('iframe_tab.enable')) {
    $attributes = [
        'prefix' => config('admin.route.prefix'),
        'middleware' => config('admin.route.middleware'),
    ];
    app('router')->group($attributes, function ($router) {
        $controller = IframeController::class;
        $router->get('/', $controller . '@index');
    });
}
