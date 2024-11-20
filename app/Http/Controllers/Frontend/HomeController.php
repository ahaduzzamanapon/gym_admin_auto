<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Feature;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        
        $years_of_exprience = Setting::first()->yeras_of_experience ?? 0;
        
        $total_clients = Setting::first()->total_clients ?? 0;
        $rmg_sector = Setting::first()->rmg_sector  ?? 0;
        $hr_pdf = Setting::first()->hr_pdf ?? '';

        $features = Feature::where('status', 1)->get();
        
        return view('welcome', compact('years_of_exprience', 'total_clients', 'rmg_sector', 'hr_pdf', 'features'));
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
