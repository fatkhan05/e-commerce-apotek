<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function obat2()
    {
        return $this->belongsTo(Obat2::class);
    }

        // protected $primaryKey = 'id_obat';
        protected $table = 'transaksi_penjualan';

        protected $fillable = ['id_transaksi', 'id_barang', 'id_pembeli', 'tanggal', 'keterangan'];
}
