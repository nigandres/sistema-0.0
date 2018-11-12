<?php

namespace App\Http\Controllers;

use App\Lenguaje;
use App\User;
use App\Libro;
use App\Autor;
use App\Editorial;
use App\Categoria;
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
        $libro->id_editorial = 1;
        $libro->id_categoria = 2;
        $libro->precio = 312;
        $libro->nivel_dificultad = 'basico';
        $libro->save();
        dd("si jala");

        // $newlibro = new Autor();
        // $newlibro->nombre = 'deitel';
        // $newlibro->save();
        // $newlibro = new Autor();
        // $newlibro->nombre = 'pearson';
        // $newlibro->save();

        // $newlibro = new Editorial();
        // $newlibro->nombre = 'porrua';
        // $newlibro->save();

        // $newlibro = new Libro();
        // $newlibro->titulo = 'nepe';
        // $newlibro->edicion = 1;
        // $newlibro->save();
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

        // Request $request;
        // dd($modelos);
        // foreach ($modelos as $modelo) {
        //     if($modelo->getTabla() == $request->input('tabla')){
        //         $db = $modelo->getConexion();
        //         $tabla = $modelo->getTabla();
        //     }
        // }

        $db = 'mongodb';
        $tabla = 'libros';
        $campos = array('titulo','edicion');
        $campocondicion = 'titulo';
        $operadorcondicion = '=';
        $condicion = 'nepe';
        $agruparpor = array('titulo');
        $ordenarpor = 'edicion';
        $tipodeorden = 'asc';
        $libroMongodb = Autor::all();
        // $libroMongodb = Libro::where('titulo','=','ginava')->get();
        $librosos = DB::connection($db)->table($tabla)
        ->select($campos)
        ->where($campocondicion,$operadorcondicion,$condicion)
        ->groupBy($agruparpor)
        ->orderBy($ordenarpor,$tipodeorden)
        // ->havingRaw('count(edicion) = 4')
        ->having('edicion', '=', '1')
        ->toSql();
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

    public function getAll(Request $request)
    {
        // $ejemplo = $librosos = DB::connection('mongodb')->table('libros')->load('editorial');
      //   $ejemplo= Libro::join('libreria.editoriales as db2','libros.id_editorial','=','db2.id')
      // ->select(['libros.*','db2.*'])
      // ->get();
        // $ejemplo = DB::connection('mongodb')->table('libros')->with('editorial')->get();


        $modelo = Libro::with(['editorial','categoria'])->where('nombre','like','%a%')->get();
        $modelo1 = Editorial::with(['libros'])->get();
        $ejemplo = Categoria::with(['libros'])->get();


        // $query2 = $ejemplo->get();
        dd($modelo,$modelo1,$ejemplo);
        $db = null;
        $tabla = null;
        $campos = null;
        $campocondicion = null;
        $operadorcondicion = null;
        $condicion = null;
        $ordenarpor = null;
        $agruparpor = null;
        $tipodeorden = 'asc';
        $modelos = collect(['Libro' => new Libro(),'Autor' => new Autor(),'Editorial' => new Editorial()]);
        $librosos = null;
        foreach ($modelos as $modelo) {
            if($modelo->getTabla() == $request->input('tabla')){
                $db = $modelo->getConexion();
                $tabla = $modelo->getTabla();
            }
        }
        $campos = $request->input('fields');
        $campocondicion = $request->input('restriccion-dondeTabla');
        $operadorcondicion = $request->input('restriccion-dondeOpcion');
        $condicion = $request->input('restriccion-dondeValor');
        $ordenarpor = $request->input('restriccion-ordenar');
        $agruparpor = $request->input('restriccion-agrupar');
        $librosos = DB::connection($db)->table($tabla);
        if($campos != null){
            $librosos = $librosos->select($campos);
        }
        if($campocondicion != null&&$operadorcondicion != null&&$condicion != null){
            $librosos = $librosos->where($campocondicion,$operadorcondicion,$condicion);
        }
        if( ($campocondicion == null||$operadorcondicion == null||$condicion == null) && ($campocondicion != null||$operadorcondicion != null||$condicion != null) ){
            return redirect()->back()->with('message', 'faltan parametros en las entradas de la condicion');
        }
        if($agruparpor != null){
            $librosos = $librosos->groupBy($agruparpor);
        }
        if($ordenarpor != null){
            $librosos = $librosos->orderBy($ordenarpor,$tipodeorden);
        }
        $query = $librosos->get();
        // dd($query,$db,$tabla,$campos,$request);
        return view('lenguajes.LenguajeIndex',compact('query'));
    }
}
