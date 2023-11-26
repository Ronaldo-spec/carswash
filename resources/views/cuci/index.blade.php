@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Menampilkan pesan error -->
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/home-user') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home-user') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $jenis_kendaraan->tipe_kendaraan }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('images') }}/{{ $jenis_kendaraan->gambar }}"
                                class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $jenis_kendaraan->jenis_kendaraan }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Tarif</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($jenis_kendaraan->tarif) }}</td>
                                    </tr>
                                    <form method="post" action="{{ url('/home-user/cuci/') }}/{{ $jenis_kendaraan->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <table>
                                            <tr>
                                                <td>Nama Pemilik&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                </td>
                                                <td>
                                                    <input type="text" name="nama_pemilik" class="form-control"
                                                        required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Merk Kendaraan&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                </td>
                                                <td>
                                                    <input type="text" name="merk_kendaraan" class="form-control"
                                                        required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Polisi</td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                </td>
                                                <td>
                                                    <input type="text" name="nopol" class="form-control" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Foto Kendaraan</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="file" name="foto_kendaraan" class="form-control"
                                                        accept="image/*" required="">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <button type="submit" class="btn btn-primary mt-3">LOAD KE
                                                        CUCIAN</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection