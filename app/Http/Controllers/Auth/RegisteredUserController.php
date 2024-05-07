<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Validate the request
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ], [
        'password.required' => 'The password field is required.',
        'password.confirmed' => 'The password confirmation does not match.',
    ]);

    try {
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'role' => 'user',
            'status' => 'active',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        // Check if the user was created successfully
        if (!$user) {
            throw new \Exception('Failed to create user.');
        }

        // Log the user in
        Auth::login($user);

        // Redirect the user
        return redirect(RouteServiceProvider::HOME)->with('success', 'User registered successfully!');

    } catch (\Exception $e) {
        // Log the error
        Log::error($e->getMessage());

        return back()->with('error', 'Failed to register user. Please try again.');
    }
}



    public function loginUser(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

    }

    
}
