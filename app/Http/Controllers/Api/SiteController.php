<?php

namespace Tracker\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tracker\Http\Controllers\Controller;

use Tracker\Site;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::orderBy('id','DESC')->get();

        return [
            'status' => 'success',
            'sites' => $sites
        ];
    }

    public static function getSite($siteId)
    {
        return [
            'status' => 'success',
            'site' => Site::find($siteId)
        ];
    }

    public function create(Request $request)
    {
        $formData = $request->all();

        $newSite = new Site();
        $newSite->url = $formData['siteurl'];
        $newSite->tracking_code = substr(sha1(date('YmdHis').rand(0,999999)), 0,5);
        $newSite->save();

        $site = self::getSite($newSite->id);

        return [
            'status' => 'success',
            'site' => $site['site']
        ];
    }
}
