@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Lista de tablas</h2>

        <ul>
            @for ($i = 0; $i < count($tablas); $i++)
                <li>
                    <a href="{{ route('admin.show', $tablas[$i]->Tables_in_MovieMatch) }}"> <!--Tables_in_nombre de la base de datos-->
                        {{ $tablas[$i]->Tables_in_MovieMatch }}
                    </a>
                </li>
            @endfor
        </ul>
    </div>
@endsection
