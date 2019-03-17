<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Google_Client;
use Google_Service_People;
use App\User;
use Auth;
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
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $provider = 'github';
        $user = Socialite::driver('github')->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return (redirect()->route('posts.index'));
    }
    public function findOrCreateUser($user, $provider)
    {
        //dd($user);
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->nickname,
            'email'    => $user->email,
            'provider' => $provider,
            'github_id' => $user->id,
            'avatar' => $user->avatar,
            'password'=> $user->token
        ]);
    }

    public function redirectToGoogle(){

        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $provider = 'google';
        /*$user = Socialite::driver('google')->user();
        $authUser = $this->googlefindOrCreateUser($user, $provider);
        Auth::login($authUser, true);*/
        $userSocial =Socialite::driver($provider)->stateless()->user();
        $AuthUser=User::where(['email' => $userSocial->getEmail()])->first();
        if($AuthUser){
            Auth::login($AuthUser);
            return (redirect()->route('posts.index'));
            
        }else{
            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'google_id'   => $userSocial->getId(),
                'provider'      => $provider,
                'password' => $userSocial->token
            ]);
            Auth::login($user);
            return (redirect()->route('posts.index'));
        }
    }
        
}


    /*public function googlefindOrCreateUser($user, $provider)
    {
        dd($user);
        $authUser = User::where('google_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->nickname,
            'email'    => $user->email,
            'provider' => $provider,
            'google_id' => $user->id,
            'password'=> $user->token
        ]);
    }*/