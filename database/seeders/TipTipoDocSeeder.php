<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipTipoDoc;

class TipTipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipTipoDoc::create([
            'TIP_NOMBRE' => 'Instructivo',
            'TIP_PREFIJO' => 'INS'
        ]);

        TipTipoDoc::create([
            'TIP_NOMBRE' => 'Reporte',
            'TIP_PREFIJO' => 'REP'
        ]);

        TipTipoDoc::create([
            'TIP_NOMBRE' => 'Manual',
            'TIP_PREFIJO' => 'MAN'
        ]);

        TipTipoDoc::create([
            'TIP_NOMBRE' => 'Formulario',
            'TIP_PREFIJO' => 'FOR'
        ]);

        TipTipoDoc::create([
            'TIP_NOMBRE' => 'Guía',
            'TIP_PREFIJO' => 'GUI'
        ]);
    }
}
