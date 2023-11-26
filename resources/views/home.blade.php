@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="row justify-content-center">
        @foreach($jenis_kendaraan as $jk)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ url('images') }}/{{ $jk->gambar }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> {{ $jk->jenis_kendaraan}}</h5>
                    <p class="card-text">
                        Harga per-Unit: <strong>IDR. {{ number_format($jk->tarif)}}</strong></p>
                    <div class="d-flex justify-content-center"><a href="{{ url('cuci/' . $jk->id) }}"
                            class="btn btn-primary">PILIH</a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection