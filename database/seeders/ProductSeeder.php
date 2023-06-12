<?php

namespace Database\Seeders;

use App\Models\Obat2;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
    public function run()
    {
        $photoPath = public_path('foto/paracetamol.jpg');
        $products = [
            [
            'id' => '1',
            'kode_obat' => '001',
            'nama_obat' => 'Pracetamol',
            'satuan_obat' => 'Tablet',
            'harga_obat' => '13000',
            'stock_obat' => '12',
            'image' => $photoPath,
        ],
        [
            'id' => '2',
            'kode_obat' => '002',
            'nama_obat' => 'Amoxcilin',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '20000',
            'stock_obat' => '50',
            'image' => $photoPath,
            ],
            [
            'id' => '3',
            'kode_obat' => '003',
            'nama_obat' => 'Demacolin',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '10000',
            'stock_obat' => '25',
            'image' => $photoPath,
            ],
            [
            'id' => '4',
            'kode_obat' => '004',
            'nama_obat' => 'Ultraflu',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '5000',
            'stock_obat' => '20',
            'image' => $photoPath,
            ],
            [
            'id' => '5',
            'kode_obat' => '005',
            'nama_obat' => 'Bodrex',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '14000',
            'stock_obat' => '25',
            'image' => $photoPath,
            ],
            [
            'id' => '6',
            'kode_obat' => '006',
            'nama_obat' => 'Nebacitin',
            'satuan_obat' => 'Serbuk',
            'harga_obat' => '27000',
            'stock_obat' => '30',
            'image' => $photoPath,
            ],
            [
            'id' => '7',
            'kode_obat' => '007',
            'nama_obat' => 'Bacitracin',
            'satuan_obat' => 'Serbuk',
            'harga_obat' => '30000',
            'stock_obat' => '29',
            'image' => $photoPath,
            ],
            [
            'id' => '8',
            'kode_obat' => '008',
            'nama_obat' => 'Botulinum Toxin',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '33000',
            'stock_obat' => '25',
            'image' => $photoPath,
            ],
            [
            'id' => '9',
            'kode_obat' => '009',
            'nama_obat' => 'Desloratadine',
            'satuan_obat' => 'Kaplet',
            'harga_obat' => '37000',
            'stock_obat' => '67',
            'image' => $photoPath,
            ],
            [
            'id' => '10',
            'kode_obat' => '010',
            'nama_obat' => 'Sulfasalazine',
            'satuan_obat' => 'Pcs',
            'harga_obat' => '29000',
            'stock_obat' => '35',
            'image' => $photoPath,
            ],
            ];
        Obat2::insert($products);
    }
}
