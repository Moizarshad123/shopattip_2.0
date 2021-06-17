<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Exception;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GoogleController extends Controller
{
    public function redirectToGoogle()      // this function direct go to google
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()  // this function get user login of googlre
    {
       
        try {
    
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                
                Auth::login($finduser);
                return redirect('/dashboard')->with('message', 'Please update Password');
                // return Redirect::route('/dashboard')->withInput()->with('message', 'Please update Password');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make('123456dummy')
                ]);
                $values = array('role_id' => 2,'user_id' => $newUser->id);
                DB::table('role_user')->insert($values);
                Auth::login($newUser);
                return redirect('/dashboard')->with('message', 'Please update Password');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
