<?php

namespace Mosiboom\DcatIframeTab;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Models\Extension;

class DcatIframeTabServiceProvider extends ServiceProvider
{
    protected $js
        = [
            'js/md5.js',
            'js/swiper.min.js',
            'js/base.js',
            'js/extend.js'
        ];
    protected $css
        = [
            'css/swiper.min.css',
            'css/style.css'
        ];

    public function init()
    {
        parent::init();

        if (!config('iframe_tab.enable')) {
            return;
        }
        //注册 Dcat的容器事件
        $this->mergeConfigFrom(__DIR__.'/iframe_tab.php', 'iframe_tab');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'iframe-tab');

        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');

        $this->app->resolving(Content::class, function ($content, $app) {
            //设置view 为 iframe.full-content
            $content->view('iframe-tab::full-content');
            if (strpos(request()->getUri(), 'auth/login') !== false) {
                #退出登录不记录当前页面
                session()->forget('url.intended');
                Admin::script(
                    <<<JS
                    if (window != top)
                        top.location.href = location.href;
JS
                );
            }
        });
        Content::resolving(function (Content $content) {
            //设置view 为 iframe.full-content
            $content->view('iframe-tab::full-content');
            if (strpos(request()->getUri(), 'auth/login') !== false) {
                Admin::script(
                    <<<JS
                    if (window != top)
                        top.location.href = location.href;
JS
                );
            }
        });
        Grid::resolving(function (Grid $grid) {
            $grid->setDialogFormDimensions(
                config('iframe_tab.dialog_area_width'),
                config('iframe_tab.dialog_area_height')
            );
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__
                .'/resource/views' => resource_path('views/vendor/iframe-tab'),
            ], 'iframe-tab.view');

            $this->publishes([
                __DIR__.'/iframe_tab.php' => config_path('iframe_tab.php'),
            ], 'iframe-tab.config');
        }
    }
}
