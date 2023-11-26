@extends('layouts.app') @section('content') <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
                <div class="card" style="width: 24rem;">
                        <div class="card-header"> Edit users </div>
                        <div class="card-body"> @if ($errors->any()) <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There
                                        were some problems with your input.<br><br>
                                        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                                </div> @endif <form method="post" action="{{ route('admin.update', $users->id) }}"
                                        id="myForm"> @csrf @method('PUT')
                                        <div class="form-group"> <label for="username">Username</label> <input
                                                        type="text" name="username" class="form-control" id="username"
                                                        value="{{ $users->username }}" aria-describedby="name">
                                        </div>
                                        <div class="form-group"> <label for="name">name</label> <input type="text"
                                                        name="name" class="form-control" id="name"
                                                        value="{{ $users->name }}" aria-describedby="name">
                                        </div>
                                        <div class="form-group"> <label for="email">Email</label> <input type="email"
                                                        name="email" class="form-control" id="email"
                                                        value="{{ $users->email }}" aria-describedby="email">
                                        </div>
                                        <div class="form-group">
                                                <label for="role">Role</label>
                                                <select name="role" class="form-control" id="role">
                                                        <option value="admin" @if($users->role === 'admin') selected
                                                                @endif>Admin</option>
                                                        <option value="user" @if($users->role === 'user') selected
                                                                @endif>User</option>
                                                </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                        </div>
                </div>
        </div>
</div> @endsection