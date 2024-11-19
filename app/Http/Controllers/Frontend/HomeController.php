<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        
        $years_of_exprience = Setting::first()->yeras_of_experience ?? 0;
        
        $total_clients = Setting::first()->total_clients ?? 0;
        $rmg_sector = Setting::first()->rmg_sector  ?? 0;
        $hr_pdf = Setting::first()->hr_pdf ?? '';
        
        return view('welcome', compact('years_of_exprience', 'total_clients', 'rmg_sector', 'hr_pdf'));
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
