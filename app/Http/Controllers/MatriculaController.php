<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MatriculaController extends Controller
{

    private const MESSAGES = [
        'alumno_id.required' => 'El alumno es obligatorio.',
        'alumno_id.numeric'  => 'El alumno no se ha seleccionado bien.',
        'alumno.exists'      => 'El alumno no existe.',
        'modulo_id.required' => 'El módulo esobligatorio.',
        'modulo_id.numeric'  => 'El módulo no se ha seleccionado bien.',
        'modulo.exists'      => 'El módulo no existe.',
    ];

    private const RULES = [
        'alumno_id' => 'required|numeric|exists:alumno,id',
        'modulo_id' => 'required|numeric|exists:modulo,id',
    ];

    public function index(): View {
        $matriculas = Matricula::all();
        //$matriculas = Matricula::orderBy('alfabeticamente')->get();
        return view('matricula.index', [
            'matriculas' => $matriculas
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index2()
    {
        $lista = [
            'uno'  => 121,
            121    => 'dos',
            'tres' => 'cuatro',
        ];
        var_dump($lista);
        echo '<pre>' . var_export($lista, true) . '</pre>';
        foreach($lista as $elemento) {
            echo $elemento . '<br>';
        }
        foreach($lista as $indice => $elemento) {
            echo $elemento . ' está en la posición ' . $indice .  '<br>';
        }
        dd($lista);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('matricula.create', [
            'alumnos'       => Alumno::orderBy('apellidos')->orderBy('nombre')->get(),
            'curso_escolar' => $this->getCursoEscolar(),
            'modulos'       => Modulo::pluck('nombre', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $matricula = new Matricula($request->all());
        $matricula->curso = $this->getCurso();
        try {
            $matricula->save();
            //return redirect()->route('matricula.create')->with(['success' => 'Se ha matriculado correctamente']);
            return back()->with(['success' => 'Se ha matriculado correctamente']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Error al matricular.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
