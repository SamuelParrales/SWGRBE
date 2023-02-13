<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&$this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::withTrashed()->where('email', $request->email)->first();
        if ($user == null) {
            return redirect(route('login', $credentials))->withErrors([
                "email" => "No existe un usuario con este correo electrónico.",
            ]);
        }

        if ($user->deleted_at)  $user->restore();
        // LOGIN
        $remember = ($request->has('remember') ? true : false);
        $validated = Auth::validate($credentials);
        if (!$validated) {

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);
            return redirect(route('login', $credentials))->withErrors([
                "password" => "Contraseña incorrecta.",
            ]);


            // return $this->sendFailedLoginResponse($request);
        }


        auth::login($user, $remember);
        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

        return $this->sendLoginResponse($request);
    }


    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
}
