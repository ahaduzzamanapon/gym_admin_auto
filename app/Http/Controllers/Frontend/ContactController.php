<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $phone_number = Setting::first()->phone_number ?? '';
        $cell_number = Setting::first()->call_number ?? '';
        $email = Setting::first()->email ?? '';
        $address = Setting::first()->address ?? '';


        return view('frontend.contact.contact', compact('phone_number', 'cell_number', 'email', 'address'));
    }
    public function request_sent(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ],
        [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'phone.required' => 'Please enter your phone number',
            'message.required' => 'Please enter your message',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'status' => 0,
            'created_at' => now(),
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        if (!$contact) {
            Toastr::error('Something went wrong. Please try again', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        Toastr::success('Your request has been sent successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back()->with('data', $data);
    }

    public function contact_request()
    {
        $contact_requests = Contact::latest()->get();
        return view('backend.contact_request.all_contact', compact('contact_requests'));
    }

    public function accept_contact($id)
    {
        $contact = Contact::find($id);
        $contact->status = 1;
        $contact->save();
        Toastr::success('Contact request accepted successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function pendding_contact()
    {
        $pendding_requests = Contact::where('status', 0)->latest()->get();
        return view('backend.contact_request.pendding_contact', compact('pendding_requests'));
    }

    public function accepted_contact()
    {
        $accepted_requests = Contact::where('status', 1)->latest()->get();
        return view('backend.contact_request.accepted_contact', compact('accepted_requests'));
    }

    public function contact_request_delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
       return response()->json(['message' => 'Contact item deleted successfully', 'status' => 200]);
    }
}
