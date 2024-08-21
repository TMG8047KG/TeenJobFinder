<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        if(Auth::check()){
            return view('profile');
        }else{
            return $this->loginView();
        }
    }

    public function loginView(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('login');
    }

    public function registerView(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('register');
    }

    public function register(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
        $data['role_id'] = 'user';
        $data['bio']='user';

        $user = User::create($data);

        Auth::login($user);

        return redirect('/profile');
    }

    /**
     * @throws ValidationException
     */
    public function login(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
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

    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
    public function profile(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile', compact('user')); // Pass the user data to the profile view
    }
}
