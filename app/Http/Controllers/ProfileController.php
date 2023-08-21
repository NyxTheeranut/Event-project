<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
    public function update(Request $request)
    {
        $image_file = $request->file('image');

        if ($image_file != null) {
            $file_name = now()->getTimestamp() . "." . $image_file->getClientOriginalExtension();
            $image_file->storeAs("public/" . $file_name);
            $image_path = "storage/" . $file_name;
            $request->user()->forceFill(['profilepicture_path' => $image_path,])->save();
        }

        //update the user's profile information
        $request->user()->forceFill([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'nickname' => $request->nickname,
            'birthdate' => $request->birthdate,
            'email' => $request->email,

        ])->save();

//        return redirect()->route('home');
        return view('profile.index', [
            'user' => $request->user(),
        ]);

//        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    public function show(User $user)
    {
        return view('profile.index', [
            'user' => $user,
        ]);
    }
}
