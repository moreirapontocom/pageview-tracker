<?php

namespace Tracker\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('sites.sites');
    }
}
