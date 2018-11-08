@extends('plantilla')


@section('head')
    <style>
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
        .progress2 { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar2 { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent2 { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>
 @endsection
 @section('body')

<div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Subir Backup</h2>
      </div>
      <div class="card-body">
            <form method="POST" action="{{ asset('file-upload') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <p>Usuarios:</p><input name="file" id="file" type="file" class="form-control" accept=".csv"  ><br/>
                    <p>Libros:</p><input name="file2" id="file2" type="file" class="form-control" accept=".csv" ><br/>
                    <p>Libros-Usuarios:</p><input name="file3" id="file3" type="file" class="form-control" accept=".csv" ><br/>
                    <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>

                    <input type="submit"  value="Submit" class="btn btn-success">
                </div>
            </form>    
      </div>
    </div>
</div>
@endsection

@section('scripts')
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>

<script type="text/javascript">
    
    var uploadField = document.getElementById("file");

    uploadField.onchange = function() {
        if(this.files[0].size > 10720000){
           alert("El archivo es muy grande (maximo 10 MB)");
           this.value = "";
        };
    };

    function validate(formData, jqForm, options) {
        var form = jqForm[0];
        if (!form.file.value) {
            alert('File not found');
            return false;
        }
    }
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('form').ajaxForm({
        beforeSubmit: validate,
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=file]').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function() {
            var percentVal = 'Wait, Saving';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
            alert('Archivos subidos y procesados');
            var percentVal = 'Saved';
            bar.width(percentVal)
            percent.html(percentVal);
        }
    });
     
    })();
</script>

@endsection
