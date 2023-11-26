<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
    {
    public function __construct()
        {
        $this->middleware('auth');
        }

    public function index()
        {
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'));
        }

    public function update(Request $request)
        {
        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        $user           = User::where('id', Auth::user()->id)->first();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
            }

        $user->update();
        return redirect('/home-user/profile')->with('success', 'Profil Berhasil Diupdate');
        }
    }
