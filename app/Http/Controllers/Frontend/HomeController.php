<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Feature;
use App\Models\Setting;
use App\Models\SiteProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        
        $SiteProfile = SiteProfile::first();
        return view('welcome', compact('SiteProfile'));
    }

    public function privacy()
    {
        return view('frontend.privacy.privacy');
    }
    public function terms_conditions()
    {
        return view('frontend.terms_conditions.terms_conditions');
    }
    public function no_access()
    {
        return view('frontend.no_access_page.no_access');
    }
}
