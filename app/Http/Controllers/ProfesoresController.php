<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use Illuminate\Http\Request;
use Exception;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesore = Profesores::orderBy('nombre')->paginate(5);
        return view('profesor.index', compact('profesore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesor.create');
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
            'nombre' => ['required', 'string', 'min:3', 'max:50'],
            'localidad' => ['required', 'string', 'min:3', 'max:90'],
            'apellidos' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'min:5', 'max:60', 'unique:profesores,email']
        ]);
        //2.- Procesar
        try {
            Profesores::create($request->all());
        } catch (Exception $ex) {
            return redirect()->route('profesor.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('profesores.index')->with("mensaje", "Profesor creado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function show(Profesores $profesore)
    {
        return view('profesor.mostrar', compact('profesore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesores  $profesore
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesores $profesore)
    {
        return view('profesor.edit', compact('profesore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesores $profesore)
    {
        //1.- Validamos
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50'],
            'localidad' => ['required', 'string', 'min:3', 'max:90'],
            'apellidos' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'min:5', 'max:60', 'unique:profesores,email,'.$profesore->id]
        ]);
        //2.- Procesar
        try {
            $profesore->update($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('profesor.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('profesores.index')->with("mensaje", "Profesor actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesores  $profesores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesores $profesore)
    {
        try {
            $profesore->delete();
        } catch (Exception $ex) {
            return redirect()->route('profesor.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('profesores.index')->with("mensaje", "Profesor borrado correctamente!!!");
    }
}
