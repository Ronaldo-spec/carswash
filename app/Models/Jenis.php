<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis_kendaraan';
    public function orderDetail()
        {
        return $this->hasMany('App\Models\orderDetail', 'jenis_id', 'id');
        }
}
