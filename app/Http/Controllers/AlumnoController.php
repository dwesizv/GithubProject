<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Modulo;
use \Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AlumnoController extends Controller
{

    private const MESSAGES = [
        // Apellidos
        'apellidos.max'      => 'Los apellidos no pueden superar los 130 caracteres.',
        'apellidos.min'      => 'Los apellidos deben tener al menos 3 caracteres.',
        'apellidos.required' => 'Los apellidos son obligatorios.',
        'apellidos.string'   => 'Los apellidos deben ser una cadena de texto.',

        // Fecha de nacimiento
        'fnac.before_or_equal'  => 'La fecha de nacimiento no puede ser posterior a hoy.',
        'fnac.date'             => 'La fecha de nacimiento no es válida.',

        // Género
        'genero.in' => 'El género debe ser masculino, femenino u otro.',

        // Nota de acceso
        'nacceso.decimal' => 'La nota de acceso debe tener como máximo 2 decimales.',
        'nacceso.gte'     => 'La nota de acceso no puede ser inferior a 0.',
        'nacceso.lte'     => 'La nota de acceso no puede ser superior a 10.',
        'nacceso.numeric' => 'La nota de acceso debe ser un número.',

        // Nombre
        'nombre.max'      => 'El nombre no puede superar los 100 caracteres.',
        'nombre.min'      => 'El nombre debe tener al menos 2 caracteres.',
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.string'   => 'El nombre debe ser una cadena de texto.',

    ];

    private const RULES = [
        'nombre'    => 'required|string|max:100|min:2',
        'apellidos' => 'required|string|max:130|min:3',
        'fnac'      => 'nullable|date|before_or_equal:today',
        'nacceso'   => 'nullable|numeric|gte:0|lte:10|decimal:0,2',
        'genero'    => 'nullable|in:masculino,femenino,otro'
    ];

    public function create(): View {
        return view('alumno.create', []);
    }
    
    public function destroy(Alumno $alumno): RedirectResponse {
        //delete from alumno where id = $alumno->id
        try {
            $alumno->delete();
        } catch(Exception $e) {
            return back()->withErrors(['error' => 'Error al borrar el alumno.',]);
        }
        return redirect()->route('alumno.index')->with(['success' => 'Se ha borrado el alumno.']);
    }
        
    public function edit(Alumno $alumno): View {
        return view('alumno.edit', ['alumno' => $alumno]);
    }

    public function index(): View {
        //$alumnos = 'select * from alumno';
        //session()->forget('success');
        $alumnos = Alumno::all();
        return view('alumno.index', ['alumnos' => $alumnos]);
    }
    
    public function matricular(Alumno $alumno): View {
        return view('alumno.matricular', [
            'alumno'        => $alumno,
            'curso_escolar' => $this->getCursoEscolar(),
            'modulos'       => Modulo::pluck('nombre', 'id'),
        ]);
    }

    public function show(Alumno $alumno): View {
        return view('alumno.show', ['alumno' => $alumno]);
    }
        
    public function store(Request $request): RedirectResponse {
        //1º validar
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $alumno = new Alumno($request->all());
        try {
            $alumno->save();
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Clave única duplicada.',
                //'nombre'     => 'Este campo forma parte de la clave única.',
                //'apellidos'  => 'Este campo también forma parte de la clave única',
            ]);
        } catch(Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Error al crear el alumno.',]);
        }
        //session(['success' => 'Se ha creado el alumno correctamente. V2']);
        return redirect()->route('alumno.index')->with(['success' => 'Se ha creado el alumno correctamente']);
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse {
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        try {
            $alumno->update($request->all());
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors(['error' => 'Clave única duplicada.',]);
        } catch(Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Error al editar el alumno.',]);
        }
        return redirect()->route('alumno.index');
    }

}