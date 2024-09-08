<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'new_image' => 'image|mimes:jpeg,png,jpg|max:3048',
        ],[
            // 
        ],[
            'name' => 'Name',
            'email' => 'Email',
            'new_image' => 'Image',
        ]);
        if(empty($request->file('new_image'))){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
             // Delete the previous image
             if (!empty($request->old_image)) {
                $previousImagePath = public_path('images') . '/' . $request->old_image;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
        }
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
        ];
        $user = DB::table('users')->where('id', Auth::user()->id)->update($userData);
        if($user){
            return Redirect::route('profile')->with('status', 'profile-updated');
        }else{
            return Redirect::route('profile')->with('status', 'profile-updated');
        }
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
}
