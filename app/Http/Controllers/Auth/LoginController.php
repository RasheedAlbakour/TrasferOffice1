<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Check the role_name of the authenticated user
        $role = $user->roles_name;

        if ($role == 'admin') {
            return redirect()->route('users.index');
        } elseif ($role == 'owner') {
            if ($user->HisOffice) {
                return redirect()->route('offices.show', ['office' => $user->HisOffice->id]);
            } else {
                return redirect()->route('currencies.index')->with('message', 'ليس لديك مكتب بعد!');
            }
        }

        return '/home';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->Status === 'مفعل') {
            return $this->guard()->attempt(
                $credentials, $request->filled('remember')
            );
        }

        return false;
    }
}
