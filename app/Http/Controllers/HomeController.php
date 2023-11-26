<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\User;
use \Auth;

class HomeController extends Controller
    {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
        {
        $this->middleware('auth');
        }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userindex()
        {
        $jenis_kendaraan = Jenis::paginate(5);
        return view('user.index', compact('jenis_kendaraan'));

        }

    public function adminindex()
        {
        $users = User::paginate(5);
        return view('admin.index', compact('users'));
        }
    }
