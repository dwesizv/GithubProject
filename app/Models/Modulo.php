<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modulo extends Model
{
    protected $table = 'modulo';

    protected $fillable = [
        'nombre',
        'abreviatura',
        'horas',
        'creditos',
    ];

    public function matriculas(): HasMany {
        return $this->hasMany(Matricula::class);
    }
}