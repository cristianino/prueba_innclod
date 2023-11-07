<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $procesos = [
            ['PRO_PREFIJO' => 'INGC', 'PRO_NOMBRE' => 'Plan de Ingeniería Civil'],
            ['PRO_PREFIJO' => 'INGE', 'PRO_NOMBRE' => 'Manual de Ingeniería Eléctrica'],
            ['PRO_PREFIJO' => 'INGM', 'PRO_NOMBRE' => 'Informe de Ingeniería Mecánica'],
            ['PRO_PREFIJO' => 'INGS', 'PRO_NOMBRE' => 'Protocolo de Ingeniería de Software'],
            ['PRO_PREFIJO' => 'INGQ', 'PRO_NOMBRE' => 'Proyecto de Ingeniería Química'],
        ];
        
        foreach ($procesos as $proceso) {
            \App\Models\ProProceso::factory()->create($proceso);
        }
    }
}
