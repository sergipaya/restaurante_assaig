<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor_fecha_cocina extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function fecha()
    {
        return $this->belongsTo(Fecha::class, 'fecha_id');
    }
}
