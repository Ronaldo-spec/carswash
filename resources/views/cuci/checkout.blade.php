@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/home-user') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home-user') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                    @if(!empty($order))
                    <p align="right">Tanggal Pesan : {{ $order->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipe Kendaraan</th>
                                <th>Nama Pemilik</th>
                                <th>Nomor Polisi</th>
                                <th>Biaya</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($orderDetail as $od)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images') }}/{{ $od->jenis->gambar }}" width="100" alt="...">
                                </td>
                                <td>{{ $od->nama_pemilik }}</td>
                                <td>{{ $od->nopol }}</td>
                                <td align="right">Rp. {{ number_format($od->jenis->tarif) }}</td>
                                <td align="right">Rp. {{ number_format($od->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('/home-user/checkout') }}/{{ $od->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda yakin akan menghapus data ?');">DELETE</i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('/home-user/konfirmasi-checkout') }}" class="btn btn-success"
                                        onclick="return confirm('Anda yakin akan Check Out ?');">
                                        Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection