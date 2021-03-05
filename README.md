# dcat-iframe-tab

## 介绍

这个扩展包基于laravel框架和dcat-admin框架，为解决dcat-admin没有自带兼容iframe架构。使用此扩展包可以构建出一个iframe架构并带有标签页管理的后台框架。

## 功能

1. 双击关闭标签页
2. 当标签页过多时，可通过鼠标滚轮选择或者按住鼠标拖动
3. 支持右键操作（目前支持的操作有：关闭所有标签、关闭其他标签、刷新当前标签、复制标签页链接）

## 安装

运行以下命令：

```
$ composer require mosiboom/dcat-iframe-tab
```

然后运行：

```
# 发布扩展必备文件
$ php artisan vendor:publish --tag=iframe-tab
# 发布扩展配置文件
$ php artisan vendor:publish --tag=iframe-tab.config
# 发布扩展的视图文件(如想自定义某些内容可发布出去，建议不要使用)
$ php artisan vendor:publish --tag=iframe-tab.view
```

`php artisan vendor:publish --tag=iframe-tab` 会将css和js发布`public/vendor/iframe-tab`

## 更新

```
$ php artisan vendor:publish --tag=iframe-tab --force
$ php artisan vendor:publish --tag=iframe-tab.config --force
```

This will override css and js files to `/public/vendor/laravel-admin-ext/iframe-tabs/`

此操作会覆盖css和js还有配置文件，配置文件可以根据自己的需要来选择是否强制覆盖

## 配置

配置文件在 `config/iframe_tab.php`下dcat-Iframe-tab可提供的配置并不多，根据自己的需要去配置：

```php
return [
    'enable' => env('START_IFRAME_TAB', true),	                            //是否开启
    'footer_setting' => [							                        //页脚配置
        'copyright' => env('APP_NAME', ''),			
        'app_version' => env('APP_VERSION', '')
    ],
    'cache' => env('IFRAME_TAB_CACHE', false),		                        //是否开启标签页缓存
    /*解决小屏幕下iframe-tab打开弹窗时，占比太大导致的提交按钮看不到，dcat中写死了dialog的宽高(不使用Iframe-tab不会出现这样的问题)*/
    'dialog_area_width' => env('IFRAME_TAB_DIALOG_AREA_WIDTH', '50%'),      //dialog打开的大小
    'dialog_area_height' => env('IFRAME_TAB_DIALOG_AREA_HEIGHT', '90vh')
];
```

