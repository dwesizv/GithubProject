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
        return view('index', []);
    }
    
    public function destroy(Alumno $alumno): RedirectResponse {
        //
        return redirect()->route('index');
    }
        
    public function edit(Alumno $alumno): View {
        //
        return view('index', []);
    }

    public function index(): View {
        //
        return view('index', []);
    }
        
    public function show(Alumno $alumno): View {
        //
        return view('index', []);
    }
        
    public function store(Request $request): RedirectResponse {
        //
        return redirect()->route('index');
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse {
        //
        return redirect()->route('index');
    }

}