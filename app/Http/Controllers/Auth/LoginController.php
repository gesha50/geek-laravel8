<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepositories;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = new UserRepositories();
    }

    public function authVk () {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVk () {
        $userData = Socialite::driver('vkontakte')->user();
        $user = $this->userRepository->getOrCreateUserBySocData($userData, 'vkontakte');
        \Auth::login($user);
        return redirect('/');
    }
    public function responseFacebook () {
        $userData = Socialite::driver('facebook')->user();
        $user = $this->userRepository->getOrCreateUserBySocData($userData, 'facebook');
        \Auth::login($user);
        return redirect('/');
    }
}
