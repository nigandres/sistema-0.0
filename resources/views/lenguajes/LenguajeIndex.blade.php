@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($tablas))
                    <div class="form-group">
                        <form action="{{ action('LenguajeController@gettables') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-control">
                                    Tablas
                                </label>
                                <select class="form-control" name="tabla">
                                    @foreach($tablas as $tabla)
                                    <option value="{{ $tabla->Tables_in_datawarehouse }}">
                                        {{ $tabla->Tables_in_datawarehouse }}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="submit" value="tabla" class="btn btn-info" name="tipo">
                            </div>
                        </form>
                    </div>
                    @endif
                    @if(isset($columnas))
                    <div class="form-group">
                        <form action="{{ action('LenguajeController@gettables') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-control">
                                    Columnas
                                </label>
                                @foreach($columnas as $columna)
                                    <input type="checkbox" name="columna[]" value="{{ $columna->Field }}">
                                    <label>{{ $columna->Field }}</label>
                                    <br>
                                @endforeach
                                <input type="hidden" value="{{ $tabla }}" name="tabla">
                                <input type="submit" value="columna" class="btn btn-info" name="tipo">
                            </div>
                        </form>
                    </div>
                    @endif
                    @if(isset($metodos))
                    <div class="form-group">
                        <form action="{{ action('LenguajeController@gettables') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-control">
                                    Columnas
                                </label>
                                @foreach($columns as $columna)
                                    <input type="hidden" name="columna[]" value="{{ $columna }}">
                                @endforeach
                                @foreach($metodos as $metodo)
                                    <input type="checkbox" name="metodo[]" value="{{ $metodo }}">
                                    <label>{{ $metodo }}</label>
                                    <br>
                                @endforeach
                                <input type="hidden" value="{{ $tabla }}" name="tabla">
                                <input type="submit" value="metodo" class="btn btn-info" name="tipo">
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
