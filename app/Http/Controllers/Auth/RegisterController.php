<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; // Для получения телефона пользователя
use App\Service\UserPhone; // Мой трейт

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
    protected $redirectTo = '/home';

    /**
     * Store a user phone
     *
     */
    protected $phone;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest');
        $this->get_phone($request);
    }

    /**
     * Geting a user phone
     *
     */
    public function get_phone (Request $request) {
        $this->phone = UserPhone::phone($request);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // мои проверки
            'phone' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Auth\User
     */
    protected function create(array $data)
    {
        $phone = $this->phone;
        $phone_code_1 = $phone['phone_code_1'];
        $phone_code_2 = $phone['phone_code_2'];
        $phone_namber = $phone['phone_namber'];
        $phone_namber_full  = $phone['phone_namber_full'];


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_code_1' => $phone_code_1,
            'phone_code_2' => $phone_code_2,
            'phone_namber' => $phone_namber,
            'phone_namber_full' => $phone_namber_full,
        ]);
    }
}
