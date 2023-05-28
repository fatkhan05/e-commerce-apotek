<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $table = 'distributor';
    protected $fillable = ['id_suplier', 'nama_suplier', 'no_telepon', 'alamat'];
    public $timestamps = false;
}
