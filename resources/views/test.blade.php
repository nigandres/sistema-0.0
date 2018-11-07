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
                        	
                        	<form action="{{asset('/home')}}" method="post" role="form">
                        		{{ csrf_field() }}
                            <div class="col-lg-12" id="body-form">
                                <div class="col-lg-6" id="tabla-input">
                                    <label class="">Seleccione sobre qué desea obtener datos:</label>
                                    
                                    <select name="tabla" class="form-control" onclick="obtieneOpciones();" id="tabla">
                                        <option></option>
                                        <option>Libros</option>
                                        <option>Autores</option>
                                        <option>Editoriales</option>
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
            +'<input type="checkbox" name="checkboxcampo[]" value="Nombre"> <label>Nombre</label><br>'
            +'<input type="checkbox" name="checkboxcampo[]" value="Ruta"> <label>Ruta</label><br>'
            +'<input type="checkbox" name="checkboxcampo[]" value="Area"> <label>Area</label><br>'
            +'<input type="checkbox" name="checkboxcampo[]" value="Tipo"> <label>Tipo</label><br>'
            +'<input type="checkbox" name="checkboxcampo[]" value="Autor"> <label>Autor</label><br>'
            +'<input type="checkbox" name="checkboxcampo[]" value="Genero"> <label>Genero</label><br>'
            +'';

            document.getElementById('restricciones-input').innerHTML = '<label class="">Restricciones:</label><br>'
    
            +'<label>Ordenar por:</label><br>'
            +'<select name="restriccion-ordenar" class="form-control">'
                +'<option>Sin ordenar</option>'
                +'<option>Nombre</option>'
                +'<option>Area</option>'
                +'<option>Tipo</option>'
                +'<option>Autor</option>'
                +'<option>Genero</option>'
            +'</select>'

            +'<label>Agrupar por:</label><br>'
            +'<select name="restriccion-agrupar" class="form-control">'
                +'<option>Sin agrupar</option>'
                +'<option>Nombre</option>'
                +'<option>Area</option>'
                +'<option>Tipo</option>'
                +'<option>Autor</option>'
                +'<option>Genero</option>'
            +'</select>'

            +'<div class="col-lg-4">'
            +'<label>Donde el:</label>'
            +'<select name="restriccion-dondeTabla" class="form-control">'
                +'<option>Sin restriccion</option>'
                +'<option>Nombre</option>'
                +'<option>Area</option>'
                +'<option>Tipo</option>'
                +'<option>Autor</option>'
                +'<option>Genero</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-lg-4">'
            +'<label>Sea:</label>'
            +'<select name="restriccion-dondeOpcion" class="form-control">'
                +'<option>Similar a</option>'
                +'<option>Igual</option>'
                +'<option>Mayor que</option>'
                +'<option>Menor que</option>'
                +'<option>Diferente de</option>'
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
            +'<input type="checkbox" name="checkboxcheckboxcampo[]" value="Nombre"> <label>Nombre</label><br>'
            +'<input type="checkbox" name="checkboxcheckboxcampo[]" value="LibrosEscritos"> <label>Libros Escritos</label><br>'
            +'';

            document.getElementById('restricciones-input').innerHTML = '<label class="">Restricciones:</label><br>'
    
            +'<label>Ordenar por:</label><br>'
            +'<select name="restriccion-ordenar" class="form-control">'
                +'<option>Sin ordenar</option>'
                +'<option>Nombre</option>'
                +'<option>Libros Escritos</option>'
            +'</select>'

            +'<label>Agrupar por:</label><br>'
            +'<select name="restriccion-agrupar" class="form-control">'
                +'<option>Sin agrupar</option>'
                +'<option>Nombre</option>'
                +'<option>Libros Escritos</option>'
            +'</select>'

            +'<div class="col-lg-4">'
            +'<label>Donde el:</label>'
            +'<select name="restriccion-dondeTabla" class="form-control">'
                +'<option>Sin restriccion</option>'
                +'<option>Nombre</option>'
                +'<option>Libros Escritos</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-lg-4">'
            +'<label>Sea:</label>'
            +'<select name="restriccion-dondeOpcion" class="form-control">'
                +'<option>Similar a</option>'
                +'<option>Igual</option>'
                +'<option>Mayor que</option>'
                +'<option>Menor que</option>'
                +'<option>Diferente de</option>'
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
            +'<input type="checkbox" name="checkboxcheckboxcampo[]" value="Nombre"> <label>Nombre</label><br>'
            +'<input type="checkbox" name="checkboxcheckboxcampo[]" value="LibrosVenta"> <label>Libros en venta</label><br>'
            +'';

        document.getElementById('restricciones-input').innerHTML = '<label class="">Restricciones:</label><br>'
    
            +'<label>Ordenar por:</label><br>'
            +'<select name="restriccion-ordenar" class="form-control">'
                +'<option>Sin ordenar</option>'
                +'<option>Nombre</option>'
                +'<option>Libros En venta</option>'
            +'</select>'

            +'<label>Agrupar por:</label><br>'
            +'<select name="restriccion-agrupar" class="form-control">'
                +'<option>Sin agrupar</option>'
                +'<option>Nombre</option>'
                +'<option>Libros En venta</option>'
            +'</select>'

            +'<div class="col-lg-4">'
            +'<label>Donde el:</label>'
            +'<select name="restriccion-dondeTabla" class="form-control">'
                +'<option>Sin restriccion</option>'
                +'<option>Nombre</option>'
                +'<option>Libros En venta</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-lg-4">'
            +'<label>Sea:</label>'
            +'<select name="restriccion-dondeOpcion" class="form-control">'
                +'<option>Similar a</option>'
                +'<option>Igual</option>'
                +'<option>Mayor que</option>'
                +'<option>Menor que</option>'
                +'<option>Diferente de</option>'
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
