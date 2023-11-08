<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TipTipoDoc;
use App\Models\ProProceso;

class DocDocumento extends Model
{
    use HasFactory;

    protected $table = 'DOC_DOCUMENTO';

    protected $primaryKey = 'DOC_ID';

    public $incrementing = true;


    protected $fillable = [
        'DOC_NOMBRE',
        'DOC_CODIGO',
        'DOC_CONTENIDO',
        'DOC_ID_TIPO',
        'DOC_ID_PROCESO',
    ];

    public function tipoDoc()
    {
        return $this->belongsTo(TipTipoDoc::class, 'DOC_ID_TIPO', 'TIP_ID');
    }

    public function proceso()
    {
        return $this->belongsTo(ProProceso::class, 'DOC_ID_PROCESO', 'PRO_ID');
    }

    protected $casts = [
        'DOC_NOMBRE' => 'string',
        'DOC_CODIGO' => 'string',
        'DOC_CONTENIDO' => 'string',
        'DOC_ID_TIPO' => 'integer',
        'DOC_ID_PROCESO' => 'integer',
    ];
}
