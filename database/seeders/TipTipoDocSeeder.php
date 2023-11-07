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
            ['TIP_PREFIJO' => 'INS', 'TIP_NOMBRE' => 'Instructivo'],
            ['TIP_PREFIJO' => 'MAN', 'TIP_NOMBRE' => 'Manual de Usuario'],
            ['TIP_PREFIJO' => 'PROC', 'TIP_NOMBRE' => 'Procedimiento Operativo'],
            ['TIP_PREFIJO' => 'POL', 'TIP_NOMBRE' => 'Política Interna'],
            ['TIP_PREFIJO' => 'GUI', 'TIP_NOMBRE' => 'Guía de Implementación'],
        ];
        
        foreach ($tiposDocumentos as $tipoDocumento) {
            \App\Models\TipTipoDoc::factory()->create($tipoDocumento);
        }
        
    }
}
