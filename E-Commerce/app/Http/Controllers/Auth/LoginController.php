<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    // ma propre methode d'athentifcation pour toute route qui se dirige vers le tableau de bprd(dashbord)
    protected function authenticated()
    {
        if(Auth::user()->role_as == '1') //1 = Admin Login
        {
            return redirect('TableDeBord')->with('status','Bienvenue sur votre tableau de bord');
        }
        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        {
            return redirect('/')->with('status','Connecté avec succès');
        }
    }


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
