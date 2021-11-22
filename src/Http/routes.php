<?php

use Mosiboom\DcatIframeTab\Http\Controllers\DcatIframeTabController;
if (config('iframe_tab.enable')) {
    $attributes = [
        'prefix'        => config('admin.route.prefix'),
        'middleware'    => config('admin.route.middleware'),
        'domain'        => config('iframe_tab.domain', null)
    ];
    app('router')->group($attributes, function ($router) {
        $controller = DcatIframeTabController::class;
        $router->get(config('iframe_tab.router','/'), $controller . '@index');
    });
}
