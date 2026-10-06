<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function about(): View {
        return view('about');
    }

    function array(): View {
        //array prehistórico
        $array1 = array();
        //array actual
        $array2 = [];
        $array2[] = 'Juan';
        $array2[] = 'Pepe';
        $array2[] = 'María';
        $array2[10] = 'Elisabeth';
        $array2[] = 'Paco';
        $array3 = ['Juan', 'Pepe', 'María'];
        $alumnos = [
            ['nombre' => 'Ajarif Saika, Fátima', 'edad' => 20],
            ['nombre' => 'Albarrán Joya, Antonio', 'edad' => 21],
            ['nombre' => 'Burgos Tomé, Adrián', 'edad' => 20],
            ['nombre' => 'Carrascosa Delgado, Pablo', 'edad' => 19],
            ['nombre' => 'Castillo García, Joaquín', 'edad' => 20],
            ['nombre' => 'El Issmail Al Assaf, Amara', 'edad' => 21],
            ['nombre' => 'Fernández Álvarez, Adrián', 'edad' => 19],
            ['nombre' => 'Galdón Fernández, Abraham', 'edad' => 22],
            ['nombre' => 'García González, Ignacio', 'edad' => 19],
            ['nombre' => 'García López, Pilar', 'edad' => 19],
            ['nombre' => 'Gorlat Castro, Raúl', 'edad' => 19],
            ['nombre' => 'Hernández Recio, Iván', 'edad' => 29],
            ['nombre' => 'Kordass Rjaf-Allah, Noussayr', 'edad' => 19],
            ['nombre' => 'Maldonado Navarro, Manuel', 'edad' => 22],
            ['nombre' => 'Montero Pelegrina, Pedro', 'edad' => 21],
            ['nombre' => 'Montoro Ruiz, Alba', 'edad' => 19],
            ['nombre' => 'Pérez Montalbán, Christian', 'edad' => 19],
            ['nombre' => 'Sánchez Sorroche, José', 'edad' => 19],
            ['nombre' => 'Serrano Rodríguez, Pablo', 'edad' => 21],
            ['nombre' => 'Vereda Orozco, Gonzalo Jesús', 'edad' => 19],
            ['nombre' => 'Vicaria García, Francisco Javier', 'edad' => 24],
            ['nombre' => 'Vilar Martín, Blas', 'edad' => 18],
            ['nombre' => 'Villegas Rivera, Luis', 'edad' => 20],
        ];
        $grupo = 'Segundo de Desarrollo de Aplicaciones Web A';
        return view('array', ['grupo' => $grupo, 'alumnos' => $alumnos, 'profesor' => 'Carmelo Vega']);
    }

    /*function aboutMetodo(): View {
        return view('about');
    }*/

    function index(): View {
        return view('index');
    }

    function portfolio(): View {
        return view('portfolio');
    }
}