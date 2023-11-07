<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipTipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposDocumentos = [
            ['TIP_PREFIJO' => 'INGC', 'TIP_NOMBRE' => 'Plan de Ingeniería Civil'],
            ['TIP_PREFIJO' => 'INGE', 'TIP_NOMBRE' => 'Manual de Ingeniería Eléctrica'],
            ['TIP_PREFIJO' => 'INGM', 'TIP_NOMBRE' => 'Informe de Ingeniería Mecánica'],
            ['TIP_PREFIJO' => 'INGS', 'TIP_NOMBRE' => 'Protocolo de Ingeniería de Software'],
            ['TIP_PREFIJO' => 'INGQ', 'TIP_NOMBRE' => 'Proyecto de Ingeniería Química'],
        ];
        
        foreach ($tiposDocumentos as $tipo) {
            \App\Models\TipTipoDoc::factory()->create($tipo);
        }
    }
}
