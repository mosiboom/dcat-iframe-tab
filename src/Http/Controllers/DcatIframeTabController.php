<?php

namespace Mosiboom\DcatIframeTab\Http\Controllers;

use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class DcatIframeTabController extends Controller
{
    public function index(Content $content)
    {
        return $content->view('iframe-tab::content');
    }
}
