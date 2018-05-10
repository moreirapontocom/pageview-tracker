<?php

namespace Tracker\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SiteController extends Controller
{
    public function index()
    {
        return view('sites.sites');
    }

    public function getSite($siteId)
    {
        return view('sites.single', ['currentSite' => $siteId]);
    }

    public function track($trackingCode)
    {
        (isset($_SERVER['REQUEST_SCHEME']) && isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI'])) ?
            $page = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] :
            $page = '';

        $referer = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';

        $tracking_infos = [
            'tracking_code' => $trackingCode,
            'viewer_ip' => $_SERVER['REMOTE_ADDR'],
            'viewer_session' => session()->getId(),
            'page' => $page,
            'referal' => $referer
        ];
        Api\PageviewController::savePageview($tracking_infos);

        $headers = ['Content-Type: image/gif'];
        return response()->file(public_path('img/pixel.gif'), $headers);
    }
}
