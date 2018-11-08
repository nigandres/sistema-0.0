@extends('plantilla')

@section('body')
<style type="text/css">
	.input-group-addon {
    min-width:100px;
    text-align:right;
}
.form-aux {
    min-width:400px;
}
</style>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
            <h1 class="page-header">Sistema 0.1</h1> 
        </div>

		
		<div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
							<div class="tooltip-demo">
                            Consultas SQL y NoSQL

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div id="errores">
                                @isset($errores)
                        		{{$errores}}
                                @endisset
                        	</div>
                        	
                            <form action="{{ action('LenguajeController@getAll') }}" method="post" role="form">
                            <!-- <foarm action="{{asset('/home')}}" method="post" role="form"> -->
                        		{{ csrf_field() }}
                                <div class="col-lg-12" id="body-form">
                                    <div class="col-lg-6" id="tabla-input">
                                        <label class="">Seleccione sobre qué desea obtener datos:</label>
                                        
                                        <select name="tabla" class="form-control" onclick="obtieneOpciones();" id="tabla">
                                            <option value=""></option>
                                            <option value="libros">Libros</option>
                                            <option value="autores">Autores</option>
                                            <option value="editoriales">Editoriales</option>
                                            <option value="alumno">-Alumnos-</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-6" id="campos-input">
                                        
                                    </div>

                                    <div class="col-lg-12" id="restricciones-input">
                                        
                                    </div>

                                    <div></div>

                                </div>
                                <br>
                                <div class="col-lg-12">
                                    <center>
                                        <button class="btn btn-success btn-block" type="submit" id="btnSubmit" disabled="">
                                            Realizar Consulta
                                        </button>
                                    </center>
                                </div>
                            
                            </form>
                                	
                        </div>
                        <!-- /.panel-body -->

                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->


@endsection


@section('scripts')

<script src="{{asset('/sb-admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>

<script>

function obtieneOpciones(){

	var sel = document.getElementById('tabla');
	var opt = sel.options[sel.selectedIndex];
	var opt = getSelectedOption(sel);

    document.getElementById('btnSubmit').disabled =false;
	
	switch(opt.text){
		case "Libros":
			document.getElementById('campos-input').innerHTML = '<label class="">Seleccione los campos a mostrar:</label><br>'
            +'<input type="checkbox" name="fields[]" value="Nombre"> <label>Nombre</label><br>'
            +'<input type="checkbox" name="fields[]" value="Ruta"> <label>Ruta</label><br>'
            +'<input type="checkbox" name="fields[]" value="Area"> <label>Area</label><br>'
            +'<input type="checkbox" name="fields[]" value="Tipo"> <label>Tipo</label><br>'
            +'<input type="checkbox" name="fields[]" value="Autor"> <label>Autor</label><br>'
            +'<input type="checkbox" name="fields[]" value="Genero"> <label>Genero</label><br>'
            +'';

            document.getElementById('restricciones-input').innerHTML = '<label class="">Restricciones:</label><br>'
    
            +'<label>Ordenar por:</label><br>'
            +'<select name="restriccion-ordenar" class="form-control">'
                +'<option value="">Sin ordenar</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="area">Area</option>'
                +'<option value="tipo">Tipo</option>'
                +'<option value="autor">Autor</option>'
                +'<option value="genero">Genero</option>'
            +'</select>'

            +'<label>Agrupar por:</label><br>'
            +'<select name="restriccion-agrupar" class="form-control">'
                +'<option value="">Sin agrupar</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="area">Area</option>'
                +'<option value="tipo">Tipo</option>'
                +'<option value="autor">Autor</option>'
                +'<option value="genero">Genero</option>'
            +'</select>'

            +'<div class="col-lg-4">'
            +'<label>Donde el:</label>'
            +'<select name="restriccion-dondeTabla" class="form-control">'
                +'<option value="">Sin restriccion</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="area">Area</option>'
                +'<option value="tipo">Tipo</option>'
                +'<option value="autor">Autor</option>'
                +'<option value="genero">Genero</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-lg-4">'
            +'<label>Sea:</label>'
            +'<select name="restriccion-dondeOpcion" class="form-control">'
                +'<option value=""></option>'
                +'<option value="like">Similar a</option>'
                +'<option value="=">Igual</option>'
                +'<option value=">">Mayor que</option>'
                +'<option value="<">Menor que</option>'
                +'<option value="<>">Diferente de</option>'
            +'</select>'
            +'</div>'

            +'<div class="col-lg-4">'
            +'<label>Valor:</label>'
            +'<input type="text" class="input-group" name="restriccion-dondeValor">'
            +'</div>'
            ;

		break;
		case "Autores":
			document.getElementById('campos-input').innerHTML = '<label class="">Seleccione los campos a mostrar:</label><br>'
            +'<input type="checkbox" name="fields[]" value="Nombre"> <label>Nombre</label><br>'
            +'<input type="checkbox" name="fields[]" value="LibrosEscritos"> <label>Libros Escritos</label><br>'
            +'';

            document.getElementById('restricciones-input').innerHTML = '<label class="">Restricciones:</label><br>'
    
            +'<label>Ordenar por:</label><br>'
            +'<select name="restriccion-ordenar" class="form-control">'
                +'<option value="">Sin ordenar</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="libros_escritos">Libros Escritos</option>'
            +'</select>'

            +'<label>Agrupar por:</label><br>'
            +'<select name="restriccion-agrupar" class="form-control">'
                +'<option value="">Sin agrupar</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="libros_escritos">Libros Escritos</option>'
            +'</select>'

            +'<div class="col-lg-4">'
            +'<label>Donde el:</label>'
            +'<select name="restriccion-dondeTabla" class="form-control">'
                +'<option value="">Sin restriccion</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="libros_escritos">Libros Escritos</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-lg-4">'
            +'<label>Sea:</label>'
            +'<select name="restriccion-dondeOpcion" class="form-control">'
                +'<option value=""></option>'
                +'<option value="like">Similar a</option>'
                +'<option value="=">Igual</option>'
                +'<option value=">">Mayor que</option>'
                +'<option value="<">Menor que</option>'
                +'<option value="<>">Diferente de</option>'
            +'</select>'
            +'</div>'

            +'<div class="col-lg-4">'
            +'<label>Valor:</label>'
            +'<input type="text" class="input-group" name="restriccion-dondeValor">'
            +'</div>'
            ;

		break;
		case "Editoriales":
			document.getElementById('campos-input').innerHTML = '<label class="">Seleccione los campos a mostrar:</label><br>'
            +'<input type="checkbox" name="fields[]" value="Nombre"> <label>Nombre</label><br>'
            +'<input type="checkbox" name="fields[]" value="LibrosVenta"> <label>Libros en venta</label><br>'
            +'';

        document.getElementById('restricciones-input').innerHTML = '<label class="">Restricciones:</label><br>'
    
            +'<label>Ordenar por:</label><br>'
            +'<select name="restriccion-ordenar" class="form-control">'
                +'<option value="">Sin ordenar</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="libros_en_venta">Libros En venta</option>'
            +'</select>'

            +'<label>Agrupar por:</label><br>'
            +'<select name="restriccion-agrupar" class="form-control">'
                +'<option value="">Sin agrupar</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="libros_en_venta">Libros En venta</option>'
            +'</select>'

            +'<div class="col-lg-4">'
            +'<label>Donde el:</label>'
            +'<select name="restriccion-dondeTabla" class="form-control">'
                +'<option value="">Sin restriccion</option>'
                +'<option value="nombre">Nombre</option>'
                +'<option value="libros_en_venta">Libros En venta</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-lg-4">'
            +'<label>Sea:</label>'
            +'<select name="restriccion-dondeOpcion" class="form-control">'
                +'<option value=""></option>'
                +'<option value="like">Similar a</option>'
                +'<option value="=">Igual</option>'
                +'<option value=">">Mayor que</option>'
                +'<option value="<">Menor que</option>'
                +'<option value="<>">Diferente de</option>'
            +'</select>'
            +'</div>'

            +'<div class="col-lg-4">'
            +'<label>Valor:</label>'
            +'<input type="text" class="input-group" name="restriccion-dondeValor">'
            +'</div>'
            ;
		break;

		default :
			document.getElementById('campos-input').innerHTML = "";
            document.getElementById('restricciones-input').innerHTML ="";
            document.getElementById('btnSubmit').disabled =true;
		break;
	}
	
};

function getSelectedOption(sel) {
    var opt;
    for ( var i = 0, len = sel.options.length; i < len; i++ ) {
        opt = sel.options[i];
        if ( opt.selected === true ) {
            break;
        }
    }
    return opt;
}


</script>

@endsection