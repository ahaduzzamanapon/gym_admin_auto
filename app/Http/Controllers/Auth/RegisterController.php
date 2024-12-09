<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|email|email:dns|unique:users',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'father_name' => ['required', 'string', 'max:255'],
                'mother_name' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $validation = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email', // Make sure column name is correct
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'father_name' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
        ]);

        // If validation fails, redirect back with errors
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }



        Member::create(
            [
                'mem_name' => $data['name'],
                'mem_father' => $data['father_name'],
                'mem_mother' => $data['mother_name'],
                'mem_gender' => $data['gender'],
                'mem_address' => '',
                'member_unique_id' => 'MEM' . time(),
                'mem_admission_date' => date('Y-m-d'),
                'mem_cell' => '',
                'mem_email' => $data['email'],
                'mem_img_url' => '',
            ]
        );

        return User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'member_id' => Member::where('mem_email', $data['email'])->first()->id,
                'password' => Hash::make($data['password']),
            ]
        );
    }
}
