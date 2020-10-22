<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use MongoDB\Driver\Exception\Exception;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /*
    |--------------------------------------------------------------------------
    |           Multi Auth Logic
    |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1)
        {
            $this->redirectTo = route('admin.dashboard');
        }
        elseif(Auth::check() && Auth::user()->role->id == 2){

            $this->redirectTo = route('owner.dashboard');
        }
        else{
            $this->redirectTo = route('user.dashboard');
        }

        $this->middleware('guest')->except('logout');
    }
    /*
    |--------------------------------------------------------------------------
    |           Multi Auth Logic Ends
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Login facebook
    |--------------------------------------------------------------------------
    */

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->user();

            $find_user = User::where('provider_id', $user->id)
                        ->where('provider',$provider)
                        ->first();

            if($find_user){

                Auth::login($find_user);

//                return redirect('/');
                return redirect()->back();
            }
            else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 3,
                    'provider_id'=> $user->id,
                    'provider'=> $provider,
                ]);

                Auth::login($newUser);

                return redirect()->back();
            }

        } catch (Exception $e) {
            return redirect('login/$provider');
        }
    }


}
