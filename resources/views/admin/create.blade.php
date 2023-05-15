@extends('layouts.dashboardTpl')

@section('content')
    <div class="container">
        <h2>Crear registro en {{ $tabla }}</h2>

        <form method="POST" action="{{ route('admin.store', $tabla) }}">
            @csrf

            @foreach ($columnas as $columna)
                <div class="form-group">
                    <label for="{{ $columna }}">{{ $columna }}:</label>
                    <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection