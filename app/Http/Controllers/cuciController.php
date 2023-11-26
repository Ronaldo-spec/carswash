<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\orderDetail;
use App\Models\Jenis;
use App\Models\User;
use Auth;
use Alert;
use Carbon\Carbon;

class cuciController extends Controller
    {

    public function __construct()
        {
        $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
        {
        $jenis_kendaraan = Jenis::find($id);
        return view('cuci.index', compact('jenis_kendaraan'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
        //
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
        {
        $jenis_kendaraan   = Jenis::find($id);
        $tanggal           = Carbon::now();
        $requestedQuantity = 1;
        $nama_pemilik      = $request->input('nama_pemilik');
        $merk              = $request->input('merk_kendaraan');
        $nopol             = $request->input('nopol');

        // Kemudian gunakan $fileName untuk menyimpan nama file ke dalam atribut 'foto_kendaraan'




        //validate order 
        $order = Order::firstOrCreate([
            'user_id' => Auth::user()->id,
            'status'  => 0,
        ], [
            'tanggal'      => $tanggal,
            'jumlah_harga' => 0,
        ]);

        //Validate Detail Order
        $orderDetail = orderDetail::firstOrNew([
            'jenis_id' => $jenis_kendaraan->id,
            'order_id' => $order->id
        ], [
            'nama_pemilik' => $nama_pemilik,
            'merk'         => $merk,
            'nopol'        => $nopol
        ]);

        // Jika detail order belum ada, buat baru
        if(!$orderDetail->exists) {
            $orderDetail->jumlah       = $requestedQuantity;
            $orderDetail->jumlah_harga = $jenis_kendaraan->tarif;
            $orderDetail->save();

            // Simpan tarif kendaraan sebagai jumlah harga pertama
            $order->jumlah_harga += $jenis_kendaraan->tarif * 1;
            $order->save();
            // $orderDetail->jumlah = $orderDetail->jumlah + $requestedQuantity;

            //harga sekarang
            $harga_order_detail_baru   = $jenis_kendaraan->tarif * $requestedQuantity;
            $orderDetail->jumlah_harga = $harga_order_detail_baru;
            $orderDetail->update();

            // $order               = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            // $order->jumlah_harga = $order->jumlah_harga + $jenis_kendaraan->tarif * $requestedQuantity;
            // $order->update();

            return redirect('/home-user')->with('success', 'Pesanan Berhasil Ditambahkan');
            

            } else {

            // $orderDetailBaru           = $jenis_kendaraan->tarif;
            // $orderDetail->jumlah_harga = $orderDetail->jumlah_harga + $orderDetailBaru;
            // $orderDetail->update();

            // Ambil semua order detail untuk menghitung total
            $total = OrderDetail::where('order_id', $order->id)->sum('jumlah_harga');

            // Simpan total ke dalam order
            // $order->jumlah_harga += $total;
            // $order->save();


           

            $fileName = ''; // Default nama file kosong
            if($request->hasFile('foto_kendaraan')) {
                $file     = $request->file('foto_kendaraan');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $orderDetail->foto_kendaraan = $fileName;
                $orderDetail->save();
                }

            

            return redirect('/home-user')->with('success', 'Jenis kendaraan ini sudah ada dalam pesanan Anda');
            // return redirect('home')->with('success', 'Jumlah Kendaraan yang Dicuci Berhasil Ditambahkan');
            }

        // Jika detail order sudah ada, tambahkan ke jumlah pesanan dan jumlah harga

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
        {
        $order       = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $orderDetail = [];

        if(!empty($order)) {
            $orderDetail = orderDetail::where('order_id', $order->id)->get();
            }

        return view('cuci.checkout', compact('order', 'orderDetail'));
        }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {
        //
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
        //
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
        $orderDetail = orderDetail::where('id', $id)->first();

        $order = Order::where('id', $orderDetail->order_id)->first();
        // $order->jumlah_harga = $orderDetail->jumlah_harga - $orderDetail->jumlah_harga;
        $order->jumlah_harga = $order->jumlah_harga - $orderDetail->jumlah_harga;
        $order->update();


        $orderDetail->delete();

        return redirect('/home-user/checkout')->with('success', 'Pesanan Berhasil Dihapus');
        }

    public function konfirmasi()
        {

        $order         = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order_id      = $order->id;
        $order->status = 1;
        $order->update();


        return redirect('/home-user/history/' . $order_id)->with('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran');

        }
    }
