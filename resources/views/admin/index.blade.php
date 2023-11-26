@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>DAFTAR USER</h2>
        </div>
        <div class="float-right my-2"> <a class="btn btn-success" href="{{ route('admin.create') }}"> Input
                User</a> </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
<div class="card mt-2">
    <div class="card-body">
        @endif <table class="table table-bordered">
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST"> <a class="btn btn-info"
                            href="{{ route('admin.show', $user->id) }}">Show</a> <a class="btn btn-primary"
                            href="{{ route('admin.edit', $user->id) }}">Edit</a> @csrf
                        @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button> </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection