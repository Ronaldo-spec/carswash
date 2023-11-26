@extends('layouts.app') @section('content') <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header"> Detail User </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID: </b>{{$users->id}}</li>
                    <li class="list-group-item"><b>Username: </b>{{$users->username}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$users->name}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$users->email}}</li>
                    <li class="list-group-item"><b>Role: </b>{{$users->role}}</li>
                </ul>
            </div> <a class="btn btn-success mt-3" href="{{ route('admin.index') }}">Kembali</a>
        </div>
    </div>
</div> @endsection
