<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DocDocumento;

class TipTipoDoc extends Model
{
    use HasFactory;

    protected $table = 'TIP_TIPO_DOC';
    protected $primaryKey = 'TIP_ID';

    public $incrementing = true;


    protected $fillable = ['TIP_PREFIJO', 'TIP_NOMBRE'];

    protected $guarded = ['TIP_ID'];

    protected $casts = [
        'TIP_PREFIJO' => 'string',
        'TIP_NOMBRE' => 'string',
    ];


    public function documentos()
    {
        return $this->hasMany(DocDocumento::class, 'DOC_ID_TIPO', 'TIP_ID');
    }
}
