<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat2 extends Model
{

    use HasFactory;

    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    protected $table = 'obat2';
    protected $fillable = [
        'id', 'kode_obat', 'nama_obat', 'deskripsi', 'satuan_obat', 'harga_obat', 'stock_obat', 'image', 'total_terjual'];
    public $timestamps = false;
}
