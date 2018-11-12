<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Autor;
use App\Carrera;
use App\Categoria;
use App\Centro;
use App\Convenio;
use App\Editorial;
use App\Libro;
use App\Materia;
use App\User;
use App\Lenguaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LenguajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editorial = new User();
        $editorial->name = 'isra';
        $editorial->email = 'isra@hot.com';
        $editorial->password = Hash::make('111');
        $editorial->save();
        $editorial = new Categoria();
        $editorial->nombre = 'informatica';
        $editorial->save();
        $editorial = new Categoria();
        $editorial->nombre = 'fisica';
        $editorial->save();
        $editorial = new Categoria();
        $editorial->nombre = 'ciencia';
        $editorial->save();
        $editorial = new Editorial();
        $editorial->nombre = 'porrua';
        $editorial->reputacion = 'buena';
        $editorial->save();
        $editorial = new Editorial();
        $editorial->nombre = 'mcgrawhill';
        $editorial->reputacion = 'buena';
        $editorial->save();
        $libro = new Libro();
        $libro->id = count(Libro::all())+1;
        $libro->nombre = 'el saber';
        $libro->id_editorial = 1;
        $libro->id_categoria = 1;
        $libro->precio = 33;
        $libro->nivel_dificultad = 'avanzado';
        $libro->save();
        $libro = new Libro();
        $libro->id = count(Libro::all())+1;
        $libro->nombre = 'el arte de code';
        $libro->id_editorial = 2;
        $libro->id_categoria = 2;
        $libro->precio = 99.45;
        $libro->nivel_dificultad = 'medio';
        $libro->save();
        $libro = new Libro();
        $libro->id = count(Libro::all())+1;
        $libro->nombre = 'muy ortogonal';
        $libro->id_editorial = 1;
        $libro->id_categoria = 3;
        $libro->precio = 200;
        $libro->nivel_dificultad = 'avanzado';
        $libro->save();
        $libro = new Libro();
        $libro->id = count(Libro::all())+1;
        $libro->nombre = 'agujeros negros';
        $libro->id_editorial = 2;
        $libro->id_categoria = 2;
        $libro->precio = 312;
        $libro->nivel_dificultad = 'basico';
        $libro->save();
        dd("registros creados");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lenguaje  $lenguaje
     * @return \Illuminate\Http\Response
     */
    public function show(Lenguaje $lenguaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lenguaje  $lenguaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Lenguaje $lenguaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lenguaje  $lenguaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lenguaje $lenguaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lenguaje  $lenguaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lenguaje $lenguaje)
    {
        //
    }

    public function getAll(Request $request)
    {
        $db = null;
        $model = null;
        $tabla = null;
        $campos = null;
        $campocondicion = null;
        $operadorcondicion = null;
        $condicion = null;
        $ordenarpor = null;
        $agruparpor = null;
        $tipodeorden = 'asc';
        $modelos = collect([
            'Alumno' => new Alumno(),
            'Autor' => new Autor(),
            'Carrera' => new Carrera(),
            'Categoria' => new Categoria(),
            'Centro' => new Centro(),
            'Convenio' => new Convenio(),
            'Editorial' => new Editorial(),
            'Libro' => new Libro(),
            'Materia' => new Materia()
        ]);
        $librosos = null;
        foreach ($modelos as $modelo) {
            if($modelo->getTabla() == $request->input('tabla')){
                $db = $modelo->getConexion();
                $tabla = $modelo->getTabla();
                $model = $modelo;
            }
        }
        // $modelo = new Libro();
        // $model = $model;
        // ::with(['editorial','categoria'])
        // ->where('nombre','like','%a%')
        $query = $model->get();
        // $posts = Libro::with(['editorial'])
        // ->whereHas('editorial', function ($query) {
        //     $query->where('nombre', '=', 'porrua');
        // })->get();
        
        // dd($query);

        // foreach($query as $valor){
        //     foreach ($valor->toArray() as $key => $value) {
        //         # code...
        //     dd($key,$value);
        //     }
        // }
        return view('lenguajes.LenguajeIndex',compact('query'));
    }
}
