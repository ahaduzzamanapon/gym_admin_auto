<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DemuRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DemuRequestController extends Controller
{
    public function index()
    {
        return view('frontend.demu_request.demu_request');
    }

    public function request_sent(Request $request){
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company_name' => 'required',
            'company_size' => 'required',
            'service' => 'required | in:0,1',
            'message' => 'required',
        ]);
        $demu_sent = DemuRequest::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_name' => $request->company_name,
                'company_size' => $request->company_name,
                'module' => $request->module,
                'region' => $request->region,
                'status' => 0, // 0: pending, 1: accepted
                'service' => $request->service, // 0: RMS HRM, 1: Corporate HRM
                'message' => $request->message,
            ]
        
        );

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'company_size' => $request->company_name,
            'module' => $request->module,
            'region' => $request->region,
            'status' => 0, // 0: pending, 1: accepted
            'service' => $request->service, // 0: RMS HRM, 1: Corporate HRM
            'message' => $request->message,
        ];
        if(!$demu_sent){
            Toastr::error('Something went wrong. Please try again.', 'error', ["positionClass" => "toast-top-right"]);
            return back();
        }
        Toastr::success('Your request has been sent successfully. We will contact you soon.', 'success', ["positionClass" => "toast-top-right"]);
        
        return back()->with('data', $data);
    }

    public function admin_index(){
        $demu_requests = DemuRequest::latest()->get();
        return view('backend.demu_request.all_demu', compact('demu_requests'));
    }

    public function request_view($id){
        $demu_request = DemuRequest::find($id);
        return view('backend.demu_request.single_demu_view', compact('demu_request'));
    }

    public function accept_demu($id){
        $demu_request = DemuRequest::find($id);
        $demu_request->status = 1;
        $demu_request->save();
        Toastr::success('Request accepted successfully.', 'success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function pendding_demu(){
        $pendding_requests = DemuRequest::where('status', 0)->latest()->get();
        return view('backend.demu_request.pendding_list', compact('pendding_requests'));
    }

    public function accepted_demu(){
        $accepted_requests = DemuRequest::where('status', 1)->latest()->get();
        return view('backend.demu_request.accepted_list', compact('accepted_requests'));
    }
}
