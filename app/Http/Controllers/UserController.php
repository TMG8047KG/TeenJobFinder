<?php

namespace App\Http\Controllers;

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
        if(Auth::check()){
            $user = Auth::user();
            $favorites = Marks::where(['user_id' => Auth::id()])->get();
            $posts = Post::findOrFail($favorites->pluck('post_id'));
            if ($user->company_id !== null && $user->company_id !== 0) {
                // The user has a company
                $company = Company::find($user->company_id);
                // You can now access the company details using $company
            } else {
                // The user does not have a company
            }
            return view('profile',['user'=>$user, 'favorites'=>$posts]);
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
        $data['company_id'] = 0;
        $data['photo'] = null;
        $data['bio']= null;

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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate photo
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Handle profile photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if exists
            if ($user->photo && \Storage::exists('public/' . $user->photo)) {
                \Storage::delete('public/' . $user->photo);
            }

            // Store the new photo
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $path;
        }

        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('profile')->with('status', 'Profile updated successfully!');
    }


}





