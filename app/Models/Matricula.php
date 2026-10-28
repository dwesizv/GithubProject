<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matricula extends Model
{
    protected $table = 'matricula';
    
    protected $fillable = [
        'alumno_id',
        'curso',
        'modulo_id',
        'nota',
    ];

    /*public function alumno() {
        return $this->belongsTo('App\Models\Alumno');
    }*/
    
    public function alumno(): BelongsTo {
        return $this->belongsTo(Alumno::class);
    }

    public function modulo(): BelongsTo {
        return $this->belongsTo(Modulo::class);
    }
}