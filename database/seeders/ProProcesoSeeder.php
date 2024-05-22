<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProProceso;

class ProProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProProceso::create([
            'PRO_NOMBRE' => 'Ingeniería',
            'PRO_PREFIJO' => 'ING'
        ]);

        ProProceso::create([
            'PRO_NOMBRE' => 'Desarrollo',
            'PRO_PREFIJO' => 'DES'
        ]);

        ProProceso::create([
            'PRO_NOMBRE' => 'Investigación',
            'PRO_PREFIJO' => 'INV'
        ]);

        ProProceso::create([
            'PRO_NOMBRE' => 'Producción',
            'PRO_PREFIJO' => 'PROD'
        ]);

        ProProceso::create([
            'PRO_NOMBRE' => 'Calidad',
            'PRO_PREFIJO' => 'CAL'
        ]);
    }
}
