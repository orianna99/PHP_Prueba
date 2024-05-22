<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProProceso extends Model
{
    use HasFactory;
    protected $table = 'pro_proceso';

    protected $primaryKey = 'PRO_ID';

    protected $fillable = [
        'PRO_NOMBRE',
        'PRO_PREFIJO',
    ];
}
