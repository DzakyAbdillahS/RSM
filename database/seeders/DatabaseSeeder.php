<?php

namespace Database\Seeders;

use App\Models\DetailMonitoring;
use App\Models\JenisMonitoring;
use App\Models\Material;
use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PekerjaanSeeder::class,
            JenisMonitoringSeeder::class,
            DetailMonitoringSeeder::class,
            MaterialSeeder::class,
            HargaSeeder::class
            ]);
    }
}
