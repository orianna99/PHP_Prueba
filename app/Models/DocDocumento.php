<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocDocumento extends Model
{
    use HasFactory;
    protected $table = 'doc_documento';

    protected $primaryKey = 'DOC_ID';
    protected $fillable = [
        'DOC_NOMBRE',
        'DOC_CODIGO',
        'DOC_CONTENIDO',
        'DOC_ID_TIPO',
        'DOC_ID_PROCESO'
    ];

    public function tipTipoDoc()
    {
        return $this->belongsTo(TipTipoDoc::class, 'DOC_ID_TIPO');
    }

    public function proProceso()
    {
        return $this->belongsTo(ProProceso::class, 'DOC_ID_PROCESO');
    }
}
