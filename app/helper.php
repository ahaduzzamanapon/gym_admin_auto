<?php

use App\Models\DemuRequest;
use App\Models\Contact;
use App\Models\Setting;

// $demu_request_length = DemuRequest::where('status', 0)->count();
if (!function_exists('demu_request_length')) {
    function demu_request_length()
    {
        return DemuRequest::where('status', 0)->count();
    }
}

if(!function_exists('contact_request_length')){
    function contact_request_length(){
        return Contact::where('status', 0)->count();
    }
}


if (!function_exists('formatDateTime')) {
    function formatDateTime($datetimeString, $format = 'Y-m-d H:i:s')
    {
        $datetime = new DateTime($datetimeString);
        return $datetime->format($format);
    }
}

if(!function_exists('getSetting')){
    function facebook_Link(){
        return Setting::first()->facebook_link ?? '';
    }

    function twitter_Link(){
        return Setting::first()->twitter_link ?? '';
    }

    function telegram_Link(){
        return Setting::first()->telegram_link ?? '';
    }
    function whatsapp_Link(){
        return Setting::first()->whatsapp_link ?? '';
    }
    function youtube_Link(){
        return Setting::first()->youtube_link ?? '';
    }


}