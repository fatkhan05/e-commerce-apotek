<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id');
    }

    public function obat2()
    {
        return $this->belongsTo(Obat2::class, 'product_id');
    }

        protected $table = 'transaksi_penjualan';

        protected $fillable = ['amount' , 'order_id' , 'product_id'];
}
