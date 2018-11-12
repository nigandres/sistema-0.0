@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- poner en un archivo a parte -->
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <!--  -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <form action="{{ action('LenguajeController@getAll') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-control">
                                    Tablas
                                </label>
                                @if(count($consulta)!=0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                        @foreach($consulta->first()->toArray() as $col => $valor)
                                            <td>{{ $col }}</td>
                                        @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($consulta as $datos => $valor)
                                        <tr>
                                            @foreach($valor->toArray() as $dato)
                                            @if(is_array($dato))
                                                <td>
                                                    @foreach($dato as $cosa)
                                                    @foreach($cosa as $roma)
                                                        @if(is_array($roma))
                                                        @foreach($roma as $amor)
                                                        @endforeach
                                                        @else
                                                        {{ dd($roma) }}
                                                        <label>{{ $cosa }}</label><br>
                                                        @endif
                                                    @endforeach
                                                    @endforeach
                                                </td>
                                            @else
                                            <td>{{ $dato }}</td>
                                            @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
