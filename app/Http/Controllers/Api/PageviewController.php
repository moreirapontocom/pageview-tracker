<?php

namespace Tracker\Http\Controllers\Api;

use Illuminate\Http\Request;
use Tracker\Http\Controllers\Controller;

use Tracker\Site;
use Tracker\Pageview;

class PageviewController extends Controller
{
    public static function getPageviewsFromWebsite($siteId)
    {
        $pageviews = Pageview::where('site_id','=', $siteId)
                            ->orderBy('id','DESC')
                            ->get();

        return [
            'status' => 'success',
            'pageviews' => $pageviews
        ];
    }

    public static function savePageview($tracking_infos)
    {
        $site = Site::where('tracking_code','=', $tracking_infos['tracking_code'])->first();

        if (!empty($site)) {
            $pv = new Pageview();
            $pv->site_id = $site->id;
            $pv->viewer_ip = $tracking_infos['viewer_ip'];
            $pv->viewer_session = $tracking_infos['viewer_session'];
            $pv->page = $tracking_infos['page'];
            $pv->referal = $tracking_infos['referal'];
            $pv->save();
        }

        return true;
    }
}
