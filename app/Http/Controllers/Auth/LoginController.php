<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Sources\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest:web')->except(['logout','getLoginForm']);
    }

    /**
     * Show User login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        Page::setTitle('Sign in | Wealthman');
        Page::setDescription('Website authorization form');

        return view('auth.login');
    }

    /**
     * Get User login form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function getLoginForm(Request $request)
    {
        if ($request->ajax()) {
            return view('auth.authForm')->render();
        }

        return back();
    }

    public function ajaxUserLogin(Request $request)
    {
        $validation = Validator::make([ 'email' => $request->email, 'password' => $request->password], [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $errors = $validation->errors();
        $errors = json_decode($errors);
        if ($validation->passes()) {
            if (Auth::guard('web')->attempt([ 'email' => $request->email,
                'password' => $request->password], $request->get('remember'))
            ) {

                return response()->json(['success' => true], 200);
            } else {
                $message = 'The email/password combination used was not found.';

                return response()->json(['password' => $message], 422);
            }
        } else {
            return response()->json($errors, 422);
        }
    }

    /**
     * auth
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('web')->attempt([ 'email' => $request->email,
            'password' => $request->password], $request->get('remember'))
        ) {

            return redirect()->intended('/');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Logout
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        return redirect(route('home'));
    }
}
