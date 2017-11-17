<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editProfile()
    {
        return view('profiles.edit');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id
        ]);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        \Flash::success('Profil berhasil dirubah');

        return redirect('/profile');
    }
}
