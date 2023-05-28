<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = ['id_obat', 'kode_obat', 'nama_obat', 'satuan_obat', 'harga_obat', 'stock_obat'];
    public $timestamps = false;

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
