@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/home-user/history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home-user/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/home-user/history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BCA Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($order))
                    <p align="right">Tanggal Pesan : {{ $order->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Model</th>
                                <th>Nomor Transaksi</th>
                                <th>Nama Pemilik</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                
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
                                <td>{{ $od->order_id }}</td>
                                <td>{{ $od->nama_pemilik }}</td>
                                <td>{{ $od->jumlah }}</td>
                                <td align="right">Rp. {{ number_format($od->jenis->tarif) }}</td>
                                <td align="right">Rp. {{ number_format($od->jumlah_harga) }}</td>
                                
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->jumlah_harga) }}</strong></td>
                                
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->kode) }}</strong></td>
                                
                            </tr>
                             <tr>
                                <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</strong></td>
                                
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