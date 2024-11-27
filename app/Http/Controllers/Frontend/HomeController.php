<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Feature;
use App\Models\Setting;
use App\Models\SiteProfile;
use App\Models\SiteFeature;
use App\Models\SiteTrainer;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        
        $SiteProfile = SiteProfile::first();
        $AboutUs = AboutUs::first();
        $SiteFeature = SiteFeature::all();
        $SiteTrainer = SiteTrainer::all();
        return view('welcome', compact('SiteProfile', 'AboutUs', 'SiteFeature', 'SiteTrainer'));
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
