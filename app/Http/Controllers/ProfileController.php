<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('profiles.profile-edit', compact('user'));
    }

    // update profile
    public function update(Request $request)
    {
        $user = Auth::User();

        if ($request->password && $request->current_password && $request->password_confirmation) {
            if ($request->password_confirmation !== $request->password) {
                return redirect()->back()->withErrors(['password_confirmation' => "Password doesn't match!"]);
            }
            elseif (Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make($request->password);;
            } else {
                return redirect()->back()->withErrors(['current_password' => 'Current password is not correct']);
            }
        }
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->description = $request->description;
        $user->phone_number = $request->phone_number;

        $user->save();

        return redirect()->route('profile');
    }
}
