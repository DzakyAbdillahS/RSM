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
            'harga'=>65000
        ]);
        Harga::create([
            'nama'=>'D. ARMING',
            'harga'=>35000
        ]);
        Harga::create([
            'nama'=>'CLM JPT 5" 4 LBG',
            'harga'=>30000
        ]);
        Harga::create([
            'nama'=>'BAUT 1/2x2',
            'harga'=>3950
        ]);
        Harga::create([
            'nama'=>'CLMP BEUGLE 7-8"',
            'harga'=>33000
        ]);
        Harga::create([
            'nama'=>'CLM JPT 5" 3 LBG',
            'harga'=>33000
        ]);
        Harga::create([
            'nama'=>'ANCHOR',
            'harga'=>55000
        ]);
        Harga::create([
            'nama'=>'SLING',
            'harga'=>9000
        ]);
        Harga::create([
            'nama'=>'PINEX 3/8',
            'harga'=>8000
        ]);
        Harga::create([
            'nama'=>'SPANSCROF 12"',
            'harga'=>26000
        ]);
        Harga::create([
            'nama'=>'TUI TM',
            'harga'=>25000
        ]);
        Harga::create([
            'nama'=>'KAOS BAJA',
            'harga'=>5000
        ]);
        Harga::create([
            'nama'=>'PLAT LAYANG',
            'harga'=>115000
        ]);
        Harga::create([
            'nama'=>'PLAT LAYANG',
            'harga'=>115000
        ]);
        Harga::create([
            'nama'=>'MUR+RING 5/8',
            'harga'=>1900
        ]);
    }
}
