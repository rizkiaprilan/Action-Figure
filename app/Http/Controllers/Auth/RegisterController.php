<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string','min:5', 'confirmed','alpha_num'],
            'phone' => ['required', 'string', 'min:11'],
            'gender' => ['required','string'],
            'address' => ['required','min:10'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'terms' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $request = request();
        $profileImage = $request->file('photo');
//        dd($profileImage);
        $new_name = $profileImage->getClientOriginalName();
        $dest = storage_path('app/public/user');
        $profileImage->move($dest,$new_name);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'photo' => $new_name,
        ]);
//        dd($user);
        return $user;
    }
}
