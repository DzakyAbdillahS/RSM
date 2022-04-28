<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pekerjaan::create([
            'pekerjaan' => 'Pemasangan Gardu Panam',
            'lokasi' => 'Jln. HR. Subrantas',
            'no_kontrak' =>'asd/123/das',
            'tgl' => now()
        ]);
    }
}
