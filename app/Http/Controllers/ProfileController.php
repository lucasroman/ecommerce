<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->avatar = $this->makeAvatarURI($request->file('avatar'), Str::title($request->name));
        
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Auxiliar function to create avatar file name with its extension
     * 
     * @param $avatarFile is the avatar file name WITHOUT extension
     * @param $username the name with which will be saved the file
     * @return $avatarPath file path complete (see database)
     */
    public function makeAvatarURI($avatarFile, $username)
    {
        $avatar = $avatarFile;

        $avatarExtension = '.' . $avatar->extension();

        $avatarPath = $avatar->storeAs('public/avatars', Str::snake($username) . $avatarExtension);

        return $avatarPath;
    }
}
