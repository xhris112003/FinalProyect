@extends('layouts.dashboardTpl')

@section('content')
    <div class="container">
        <h2>Editar registro en {{ $tabla }}</h2>

        <form method="POST" action="{{ route('admin.update', [$tabla, $registro->id]) }}">
            @csrf
            @method('PUT')

            @foreach ($registro as $columna => $valor)
                <div class="form-group">
                    <label for="{{ $columna }}">{{ $columna }}:</label>
                    <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}" value="{{ $valor }}">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
