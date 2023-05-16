@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 10px;">
        <h2>Tabla {{ $tabla }}</h2>

        <table>
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
                            <a href="{{ route('admin.edit', ['tabla' => $tabla, 'id' => $registro->id]) }}" style="padding: 5px 10px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Editar</a>
                            <form action="{{ route('admin.destroy', ['tabla' => $tabla, 'id' => $registro->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 5px 10px; background-color: #dc3545; color: #fff; border: none; cursor: pointer; border-radius: 4px;" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
