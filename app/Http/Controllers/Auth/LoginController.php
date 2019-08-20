<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
      // return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {


        $githUbuser = Socialite::driver('github')->user();
        //dd($githUbuser);
        // $user->token;

        $user = User::where('provider_id', $githUbuser->getId())->first();
        //add user to database
        if (!$user) {
            $user = User::create([
                'email' => $githUbuser->getEmail(),
                'name' => $githUbuser->getName(),
                'provider_id' => $githUbuser->getId(),

            ]);
        }


        //login the user
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
