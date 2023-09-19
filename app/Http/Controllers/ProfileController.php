<?php

namespace App\Http\Controllers;

use App\Rules\PasswordMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile-page');
    }

    public function update()
    {
        $user = auth()->user();
        $attributes = request()->validate([
            'name' => 'string|max:255',
            'username' => ['min:3', 'max:255', Rule::unique('users', 'username')->ignore($user)],
            'email' => ['email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
            'avatar' => 'image|nullable',
            'old_password' => 'min:7|max:255|required',
            'new_password' => 'min:7|max:255|nullable',
            'retype_new_password' => 'min:7|max:255|nullable'
        ]);

        if (!Hash::check($attributes['old_password'], $user->getAuthPassword())) {
            throw ValidationException::withMessages([
                'old_password' => 'The password is not valid.'
            ]);
        }

        if ($attributes['new_password'] !== $attributes['retype_new_password']) {
            throw ValidationException::withMessages([
                'new_password' => 'The entered passwords do not match.',
                'retype_new_password' => 'The entered passwords do not match.',
            ]);
        }

        if( $attributes['new_password'] !== null ){
            $attributes['password'] = $attributes['new_password'];
        }

        if ($attributes['avatar'] ?? false) {
            $attributes['avatar'] = request()->file('avatar')->store('avatars');
        }

        $user->update($attributes);
        
        return back()->with('success', 'You have updated you profile.');

    }
}
