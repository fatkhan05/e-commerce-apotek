<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

class Cart extends Model
{
    
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['user_id' , 'product_id' , 'amount'];
    
    // protected $guarded = ['id'];

    public static function getCartItems()
    {
        if(Auth::check()){
            $carts = Cart::with(['obat2' => function($query){
                $query->select('id','kode_obat','nama_obat','satuan_obat','harga_obat','stock_obat');
            }])->orderby('id', 'Desc')->where('user_id', Auth::user()->id)->get()->toArray();
        } else {
            $carts = Cart::with(['obat2' => function($query){
                $query->select('id','kode_obat','nama_obat','satuan_obat','harga_obat','stock_obat');
            }])->orderby('id', 'Desc')->where('session_id', Session::get('session_id'))->get()->toArray();
        }
        return $carts;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function obat2()
    {
        return $this->belongsTo(Obat2::class);
    }

    
}
