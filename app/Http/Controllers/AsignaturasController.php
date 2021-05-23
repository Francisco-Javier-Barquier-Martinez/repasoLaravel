<?php

namespace App\Http\Controllers;

use App\Models\asignaturas;
use App\Models\Profesores;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignatura = asignaturas::orderBy('nombre')->paginate(5);
        return view('asignatura.index', compact('asignatura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profe = Profesores::getArrayIdNombre();
        return view('asignatura.create', compact('profe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.- Validamos
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:20'],
            'descripcion' => ['required', 'string', 'min:8', 'max:50'],
            'creditos' => ['required', 'integer', 'min:1', 'max:200'],
            'profesor_id' => ['required']
        ]);
        //2.- Procesar
        try {
            asignaturas::create($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('asignaturas.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('asignaturas.index')->with("mensaje", "Asignatura creado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function show(asignaturas $asignatura)
    {
        return view('asignatura.mostrar', compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function edit(asignaturas $asignatura)
    {
        $profesores = Profesores::getArrayIdNombre();
        return view('asignatura.edit', compact('asignatura', 'profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asignaturas $asignatura)
    {
        //1.- Validamos
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:20'],
            'descripcion' => ['required', 'string', 'min:8', 'max:50'],
            'creditos' => ['required', 'integer', 'min:1', 'max:200'],
            'profesor_id' => ['required']
        ]);
        //2.- Procesar
        try {
            $asignatura->update($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('asignaturas.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('asignaturas.index')->with("mensaje", "Asignatura actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignaturas $asignatura)
    {
        try {
            $asignatura->delete();
        } catch (\Exception $ex) {
            return redirect()->route('asignatura.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('asignaturas.index')->with("mensaje", "Asignatura borrado correctamente!!!");
    }
}
