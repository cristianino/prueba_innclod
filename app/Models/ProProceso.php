<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DocDocumento;

class ProProceso extends Model
{
    use HasFactory;

    protected $table = 'PRO_PROCESO';
    protected $primaryKey = 'PRO_ID';

    public $incrementing = true;


    protected $fillable = ['PRO_PREFIJO', 'PRO_NOMBRE'];

    protected $guarded = ['PRO_ID'];

    protected $casts = [
        'PRO_PREFIJO' => 'string',
        'PRO_NOMBRE' => 'string',
    ];


    public function documentos()
    {
        return $this->hasMany(DocDocumento::class, 'DOC_ID_TIPO', 'PRO_ID');
    }
}
