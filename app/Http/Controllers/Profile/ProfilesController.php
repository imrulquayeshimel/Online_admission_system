<?php

namespace App\Http\Controllers\Profile;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    public function editProfile()
    {
        return view('profile.update_profile')
                ->with('profile', Auth::user());
    }

    public function changePassword()
    {
        return view('profile.change_password')
                ->with('profile', Auth::user());
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $this->validate($request, [
            'old_password' => 'required|min:6',
            'password'     => 'required|min:6|confirmed|different:old_password',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill(['password' => Hash::make($request->password)])->save();

            $request->session()->flash('success', 'Password changed successfully');
            return redirect()->back();

        } else {
            $request->session()->flash('info', 'Old password does not match');
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $this->validate($request, [
            'name'  => 'required|min:2',
            'email' => 'required|min:2|email|unique:users,email,'.Auth::user()->id,
        ]);

        $user->name = $request->name;
        if ($user->email != $request->email) {
            $user->email = $request->email;
            $user->status = User::INACTIVE_USER;
            $user->save();
            Session::flash('success','Profile update successfully');
            Session::flush();
        }

        if ($user->save()) {
            Session::flash('success','Profile update successfully');
        }

        return redirect()->back();
    }
}
