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

    public function track($trackingCode, $url)
    {
        (isset($_SERVER['REQUEST_SCHEME']) && isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI'])) ?
            $page = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] :
            $page = '';

        $tracking_infos = [
            'tracking_code' => $trackingCode,
            'viewer_ip' => $_SERVER['REMOTE_ADDR'],
            'viewer_session' => session()->getId(),
            'page' => $page,
            'referal' => base64_decode($url)
        ];
        Api\PageviewController::savePageview($tracking_infos);
    }
}
