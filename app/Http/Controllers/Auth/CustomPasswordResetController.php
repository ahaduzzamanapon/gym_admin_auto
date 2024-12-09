<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class CustomPasswordResetController extends Controller
{
    
   public function showForgotPasswordForm()
   {
       return view('auth.passwords.email');
   }

   /**
    * Send the password reset link to the user.
    */
   public function sendResetLink(Request $request)
   {
       $request->validate(['email' => 'required|email|exists:users,email']);

       $status = Password::sendResetLink($request->only('email'));

       return $status === Password::RESET_LINK_SENT
           ? back()->with('status', __($status))
           : back()->withErrors(['email' => __($status)]);
   }

   /**
    * Show the password reset form.
    */
   public function showResetPasswordForm($token)
   {
       return view('auth.reset-password', ['token' => $token]);
   }

   /**
    * Handle the password reset.
    */
   public function resetPassword(Request $request)
   {
       $request->validate([
           'email' => 'required|email|exists:users,email',
           'password' => 'required|min:8|confirmed',
           'token' => 'required'
       ]);

       $status = Password::reset(
           $request->only('email', 'password', 'password_confirmation', 'token'),
           function (User $user, $password) {
               $user->forceFill([
                   'password' => Hash::make($password),
                   'remember_token' => Str::random(60),
               ])->save();
           }
       );

       return $status === Password::PASSWORD_RESET
           ? redirect()->route('login')->with('status', __($status))
           : back()->withErrors(['email' => [__($status)]]);
   }
}