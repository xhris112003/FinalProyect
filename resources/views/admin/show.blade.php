@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 10px;">
        <h2>Tabla {{ $tabla }}</h2>

        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        @foreach (array_keys((array) $registros[0]) as $key)
                            <th style="text-transform: uppercase;">{{ $key }}</th>
                        @endforeach
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            @foreach ((array) $registro as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                            <td>
                                <a href="{{ route('admin.edit', ['tabla' => $tabla, 'id' => $registro->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('admin.destroy', ['tabla' => $tabla, 'id' => $registro->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.create', ['tabla' => $tabla]) }}" class="btn btn-primary">Crear Registro</a>
        
       

    </div>
@endsection
