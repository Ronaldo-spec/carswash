<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
    {
    protected $table = 'order_detail';

    public function jenis()
	{
	      return $this->belongsTo('App\Models\Jenis','jenis_id', 'id');
	}
    public function order()
        {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
        }

    protected $fillable = [
        'jenis_id', // Tambahkan atribut 'barang_id' di sini
        'order_id',
        'jumlah',
        'nama_pemilik',
        'merk',
        'nopol',
        'foto_kendaraan',
        // tambahkan atribut lainnya jika ada
    ];
    }
