<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render("Auth/Login");
    }

    public function register()
    {
        return Inertia::render("Auth/Register");
    }

    public function register_user(Request $request)
{
    // dd($request->all());
    $form_fields = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|lowercase|email|max:255|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'profile_picture' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
    ], [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'email.unique' => 'The email has already been taken.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 6 characters.',
        'password.confirmed' => 'The password confirmation does not match.',
        'profile_picture.mimes' => 'The profile picture must be a file of type: jpeg, jpg, png.',
        'profile_picture.max' => 'The profile picture may not be greater than 2MB.',
    ]);

    if ($request->hasFile('profile_picture')) {
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    $user = new User;
    $user->name = $form_fields['name'];
    $user->email = $form_fields['email'];
    $user->password = Hash::make($form_fields['password']);
    $user->profile_photo_path = $path ?? null;
    $res = $user->save();

    if ($res) {
        return redirect()->route('login')->with('success', 'You have registered successfully');
    } else {
        return back()->with('fail', 'Something went wrong');
    }
}

    //authenticate user
    public function login_user(Request $request)
    {
        // dd($request->all());

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ],
    [
        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'password.required' => 'The password field is required.',
    ]);

        if (Auth::attempt($formFields)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'You are now Logged In');
        } else {
            // dd("here");
            





            //go back to the login page with the error message
            return back()->with('fail', 'Invalid Credentials');
        }
    }

    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'User Logged Out');
    }


}
