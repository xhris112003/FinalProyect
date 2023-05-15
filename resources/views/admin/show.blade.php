@extends('layouts.dashboardTpl')

@section('content')
    <div class="container">
        <h2>Tabla {{ $tabla }}</h2>

        <table class="table">
            <thead>
                <tr>
                    @foreach ($registros->first() as $key => $value)
                        <th>{{ $key }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        @foreach ($registro as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
