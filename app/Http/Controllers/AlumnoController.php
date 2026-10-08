<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    public function create(): View {
        //
        return view('alumno.create', []);
    }
    
    public function destroy(Alumno $alumno): RedirectResponse {
        //
        return redirect()->route('index');
    }
        
    public function edit(Alumno $alumno): View {
        //
        return view('alumno.edit', []);
    }

    public function index(): View {
        //
        return view('index', []);
    }
        
    public function show(Alumno $alumno): View {
        //
        return view('index', []);
    }
        
    /*public function store(Request $request): RedirectResponse {
        //
        return redirect()->route('index');
    }*/
    function store(Request $request) {
        //dd($request->all());
        $alumno = new Alumno($request->all());
        /*$alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->genero = $request->genero;
        $alumno->fnac = $request->fnac;
        $alumno->nacceso = $request->nacceso;*/
        $alumno->save();
        //dd($alumno);
        echo 'parece que todo ha ido bien.';
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse {
        //
        return redirect()->route('index');
    }

}