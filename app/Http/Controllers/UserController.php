<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('profile');
        }else{
            return $this->loginView();
        }
    }

    public function loginView(){
        return view('login');
    }

    public function registerView(){
        return view('register');
    }

    public function register(Request $request){
        $data = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
        $data['role_id'] = 'user';

        $user = User::create($data);

        Auth::login($user);

        return redirect('/profile');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(! Auth::attempt($data)){
            throw ValidationException::withMessages([
                'email' => "Incorrect email or password"
            ]);
        }

        $request->session()->regenerate();

        return redirect('/profile');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
