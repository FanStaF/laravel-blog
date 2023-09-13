<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function store()
    {

        $attributes = request()->validate([
            'email' => 'required|email', // exists:users,email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your credentials could not be verified'
            ]);

            // Throw error or:
            // return back()
            //     ->withInput()
            //     ->withErrors(['email' => 'Your credentials could not be verified']);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome back!');

    }
    public function create()
    {
        return view('sessions.create');
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
