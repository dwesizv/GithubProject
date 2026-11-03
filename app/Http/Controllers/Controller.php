<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

abstract class Controller
{
    protected function getCurso(): Int {
        //si el mes es 9 o mayor año actual, sino año anterior
        if(Carbon::now()->month >= 9) {
            return Carbon::now()->year;
        } else {
            return Carbon::now()->year - 1;
        }
    }

    protected function getCursoEscolar(): String {
        return $this->getCurso() . '/' . $this->getCurso() + 1;
    }
}