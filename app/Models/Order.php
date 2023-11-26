<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public function user()
        {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
        }
    public function orderDetail()
        {
        return $this->hasMany('App\Models\orderDetail', 'order_id', 'id');
        }

    protected $fillable = ['user_id', 'tanggal','jumlah_harga', 'status']; 

}
