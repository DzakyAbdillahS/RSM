<?php

namespace Database\Seeders;

use App\Models\Harga;
use Illuminate\Database\Seeder;

class HargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Harga::create([
            'nama'=>'UNP',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'ARM BRACE',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'D. ARMING',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'CLM JPT 5" 4 LBG',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'BAUT 1/2x2',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'CLMP BEUGLE 7-8"',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'CLM JPT 5" 3 LBG',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'ANCHOR',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'SLING',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'PINEX 3/8',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'SPANSCROF 12"',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'TUI TM',
            'harga'=>295000
        ]);
        Harga::create([
            'nama'=>'KAOS BAJA',
            'harga'=>295000
        ]);
    }
}
