<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\libros;

class RespaldosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function guardar(){

    }

    public function cargar(){

    	return view('backups.cargar');
    }

    public function save(Request $request){

        $fileName = 'archivo1-'.time().'.'.request()->file->getClientOriginalExtension();
 
        request()->file->move(public_path('files'), $fileName);

        $linea = 0;
		//Abrimos nuestro archivo
		$archivo = fopen(public_path('files/').$fileName, "r");
		//Lo recorremos
		$asd="<table>";
		while (($datos = fgetcsv($archivo, ",")) == true) 
		{
		  $num = count($datos);
		  $linea++;
		  $asd = $asd."<tr><td>".$datos[0]."</td><td>".$datos[1]."</td> <td>".$datos[2]."</td></tr>";

		}
		$asd=$asd."</table>";
		//Cerramos el archivo
		fclose($archivo);



		$fileName = 'archivo2-'.time().'.'.request()->file2->getClientOriginalExtension();
 
        request()->file2->move(public_path('files'), $fileName);

        $fileName = 'archivo3-'.time().'.'.request()->file3->getClientOriginalExtension();
 
        request()->file3->move(public_path('files'), $fileName);



		return response()->json(['success'=>'Los archivos se subieron y procesaron.']);
    }
}
