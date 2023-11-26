<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EditUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
    {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
        $users = User::all(); //Mengambil semua data yang ada di tabel
        $posts = User::orderBy('id', 'desc')->paginate(5);
        return view('admin.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
        return view('admin.create');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
        $user       = new User();
        $user->username  = $request->input('username');
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin.index')->with('success', 'Data Berhasil Ditambahkan');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
        {
        $users = User::find($id);
        return view('admin.detail', compact('users'));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {
        $users = User::find($id);
        return view('admin.edit', compact('users'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        {
        $request->validate([
            'username' => 'required',
            'name'     => 'required',
            'email'    => 'required',
            'role'     => 'required',
        ]);

        User::find($id)->update($request->all());

        return redirect()->route('admin.index')->with('success', 'Data Berhasil Terupdate');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
        User::find($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus');
        }
    }
