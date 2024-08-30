<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Marks;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = Auth::user();
        $favorites = Marks::where(['user_id' => Auth::id()])->get();
        $posts = Post::findOrFail($favorites->pluck('post_id'));
        return view('profile',['user'=>$user, 'favorites'=>$posts]);
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
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);

        $user = User::create($data);
        $user->notifications()->create(['text' => "You successfully registered!"]);
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
        auth()->user()->notifications()->create(['text' => "You successfully logged in!"]);
        $request->session()->regenerate();

        return redirect('/profile');
    }

    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/profile/login');
    }

    public function profile(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile', compact('user')); // Pass the user data to the profile view
    }
    public function editProfileView(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile_edit', compact('user')); // Pass the user data to the view
    }

    // Method to handle profile updates
    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'bio' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'age' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Update the user's profile information
        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->location = $request->location;
        $user->phone = $request->phone;

        // Update the user's password if it's being changed
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update the user's profile picture if it's being changed
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->photo && \Storage::exists('public/' . $user->photo)) {
                \Storage::delete('public/' . $user->photo);
            }

            // Store the new photo
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('profile')->with('status', 'Profile updated successfully!');
    }


}
