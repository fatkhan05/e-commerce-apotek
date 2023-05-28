<?php

namespace Database\Seeders;

use App\Models\Obat2;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
            'id' => '1',
            'kode_obat' => '001',
            'nama_obat' => 'Pracetamol',
            'satuan_obat' => 'Tablet',
            'harga_obat' => '13000',
            'stock_obat' => '12',
        ],
        [
            'id' => '2',
            'kode_obat' => '002',
            'nama_obat' => 'Amoxcilin',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '20000',
            'stock_obat' => '10',
            ],
            [
            'id' => '3',
            'kode_obat' => '003',
            'nama_obat' => 'Demacolin',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '10000',
            'stock_obat' => '15',
            ],
            [
            'id' => '4',
            'kode_obat' => '004',
            'nama_obat' => 'Ultraflu',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '5000',
            'stock_obat' => '20',
            ],
            [
            'id' => '5',
            'kode_obat' => '005',
            'nama_obat' => 'Bodrex',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '14000',
            'stock_obat' => '25',
            ],
            [
            'id' => '6',
            'kode_obat' => '006',
            'nama_obat' => 'Nebacitin',
            'satuan_obat' => 'Serbuk',
            'harga_obat' => '27000',
            'stock_obat' => '11',
            ],
            ];
        Obat2::insert($products);
    }
}
