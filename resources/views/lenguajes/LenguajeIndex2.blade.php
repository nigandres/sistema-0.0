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
                    <div class="form-group">
                        <label class="form-control">
                            Columnas
                        </label>
                        <select class="form-control">
                            @foreach($columnas as $colunma)
                                    <option value="adawd">
                                        coso
                                @foreach($colunma as $campo)
                                    <option value="{{ $campo->Field }}">
                                        {{ $campo->Field }}
                                    </option>
                                @endforeach
                                    </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
