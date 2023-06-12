<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

class Order extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];

    protected $table = 'orders';
    protected $fillable = ['id' , 'user_id' , 'order_id' , 'product_name' , 'quantity' , 'total_price' , 'status' , 'snap_token'];

    public static function getCartItems()
    {
            if (Auth::check()) {
                $carts = Cart::with('obat2:id,kode_obat,nama_obat,satuan_obat,harga_obat,stock_obat')
                    ->orderBy('id', 'DESC')
                    ->where('user_id', Auth::user()->id)
                    ->get()
                    ->toArray();
            } else {
                $carts = Cart::with('obat2:id,kode_obat,nama_obat,satuan_obat,harga_obat,stock_obat')
                    ->orderBy('id', 'DESC')
                    ->where('session_id', Session::get('session_id'))
                    ->get()
                    ->toArray();
            }

            return $carts;
        }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id' , 'order_id');
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}