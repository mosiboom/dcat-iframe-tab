<?php

namespace JasperMosiboom\DcatIframeTab\Controllers;

use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class IframeController extends Controller
{
    public function index()
    {
        $content = new Content();
        return $content->view('iframe-tab::content');
    }
}
