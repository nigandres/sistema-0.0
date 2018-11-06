<?php

namespace App\Http\Controllers;

use App\Lenguaje;
use App\Libro;
use App\Autor;
use App\Editorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LenguajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $newlibro = new Libro();
        // $newlibro->titulo = 'nepe';
        // $newlibro->edicion = 1;
        // $newlibro->save();
        // $newlibro = new Libro();
        // $newlibro->titulo = 'nepe';
        // $newlibro->edicion = 3;
        // $newlibro->save();
        // $newlibro = new Libro();
        // $newlibro->titulo = 'nepe';
        // $newlibro->edicion = 2;
        // $newlibro->save();
        // $newlibro = new Libro();
        // $newlibro->titulo = 'ginava';
        // $newlibro->edicion = 1;
        // $newlibro->save();
        // $newlibro = new Libro();
        // $newlibro->titulo = 'ginava';
        // $newlibro->edicion = 1;
        // $newlibro->save();

        $modelos = collect(['Libro' => new Libro(),'Autor' => new Autor(),'Editorial' => new Editorial()]);

        Request $request;
        dd($modelos);
        foreach ($modelos as $modelo) {
            if($modelo->getTabla() == $request->input('tabla')){
                $db = $modelo->getConexion();
                $tabla = $modelo->getTabla();
            }
        }

        $db = 'mongodb';
        $tabla = 'libros';
        $campos = array('titulo','edicion');
        $campocondicion = 'titulo';
        $operadorcondicion = '=';
        $condicion = 'nepe';
        $agruparpor = array('titulo');
        $ordenarpor = 'edicion';
        $tipodeorden = 'asc';
        $libroMongodb = Libro::all();
        // $libroMongodb = Libro::where('titulo','=','ginava')->get();
        $librosos = DB::connection($db)->table($tabla)
        ->select($campos)
        ->where($campocondicion,$operadorcondicion,$condicion)
        ->groupBy($agruparpor)
        ->orderBy($ordenarpor,$tipodeorden)
        // ->havingRaw('count(edicion) = 4')
        // ->having('edicion', '=', '1')
        ->get();
        // $librosos = DB::connection('mongodb')->table('libros')->where('titulo','=','nepe')->get();
        dd($libroMongodb,$librosos);








        $tablas = DB::select('show tables');
        unset($tablas[4]);
        unset($tablas[6]);
        unset($tablas[7]);
        // foreach ($tablas as $tabla) {
        //     $columnas[] = DB::select('describe '.$tabla->Tables_in_datawarehouse);
        // }
        // dd($tablas,$columnas[0][1]->Field);
        return view('lenguajes.LenguajeIndex',compact(['tablas']));
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

    public function gettables(Request $request)
    {
        if($request->input('tipo') == 'tabla'){
            $tabla = $request->input('tabla');
            $columnas = DB::select('describe '.$tabla);
            // dd($columnas,$request);
            return view('lenguajes.LenguajeIndex',compact(['tabla','columnas']));
        }
        if($request->input('tipo') == 'columna'){
            $tabla = $request->input('tabla');
            $columns = $request->input('columna');
            $metodos = collect(['having','group','sort','where','anidar']);;
            // dd($metodos,$tabla,$columns,$request);
            return view('lenguajes.LenguajeIndex',compact(['tabla','columns','metodos']));
        }
        if($request->input('tipo') == 'metodo'){
            $result = DB::table('areas')->where('id', 1)->get(['nombre','id']);
            // Table::select('name','surname')->where('id', 1)->get();
            dd($result);

            // $tabla = $request->input('tabla');
            // $columna = $request->input('columna');
            // $metodos = collect(['having','group','sort','where','anidar']);;
            // dd($metodos,$tabla,$columna,$request);
            return view('lenguajes.LenguajeIndex',compact(['tabla','columna']));
        }
    }
}
