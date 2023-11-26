@extends('layouts.app') @section('content') <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
                <div class="card" style="width: 24rem;">
                        <div class="card-header"> Tambah Users </div>
                        <div class="card-body"> @if ($errors->any()) <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There
                                        were some problems with your input.<br><br>
                                        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                                </div> @endif <form method="post" action="{{ route('admin.store') }}" id="myForm">
                                        @csrf
                                        <div class="form-group"> <label for="name">Nama</label> <input type="name"
                                                        name="name" class="form-control" id="name"
                                                        aria-describedby="name"> </div>
                                        <div class="form-group"> <label for="username">Username</label> <input
                                                        type="username" name="username" class="form-control"
                                                        id="username" aria-describedby="username"> </div>
                                        <div class="form-group"> <label for="email">Email</label> <input type="email"
                                                        name="email" class="form-control" id="email"
                                                        aria-describedby="email"> </div>
                                        <div class="form-group"> <label for="password">Password</label> <input type="password"
                                                        name="password" class="form-control" id="password"
                                                        aria-describedby="password"> </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="role">Role</label>
                                                <select name="role" class="form-control" id="role"
                                                        aria-describedby="role">
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                        </div>
                </div>
        </div>
</div> @endsection