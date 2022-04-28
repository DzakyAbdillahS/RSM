<?php

namespace Database\Seeders;

use App\Models\JenisMonitoring;
use Illuminate\Database\Seeder;

class JenisMonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisMonitoring::create([
            'nama' => 'MDU PLN',
            'id_pekerjaan' => 1

        ]);

        JenisMonitoring::create([
            'nama'=>'Non MDU Tiang Besi',
            'id_pekerjaan' => 1
        ]);

        JenisMonitoring::create([
            'nama'=>'Non MDU Tiang Beton',
            'id_pekerjaan' => 1
        ]);

        JenisMonitoring::create([
            'nama'=>'MDU PLN Gardu',
            'id_pekerjaan' => 1
        ]);

        JenisMonitoring::create([
            'nama'=>'Non MDU PLN Gardu',
            'id_pekerjaan' => 1
        ]);


    }
}
