<?php

namespace App\Http\Controllers\Auth;

use App\Sources\Page;
use App\Models\User;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Validator;

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
        $this->middleware('guest:web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $parts = explode("@", $data['email']);
        $username = $parts[0];

        return User::create([
            'name' => $username,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Show admin register form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        Page::setTitle('Sign up | Wealthman');
        Page::setDescription('Website registration form');

        return view('auth.register');
    }

    public function ajaxUserRegister(Request $request)
    {
        $validation = $this->validator($request->all());
        $errors = $validation->errors();
        $errors = json_decode($errors);

        if ($validation->passes()) {
            event(new Registered($user = $this->create($request->all())));
            $this->guard()->login($user);
            return response()->json(['success' => true], 200);
        } else {
            return response()->json($errors, 422);
        }
    }
}
