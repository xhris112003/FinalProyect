@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar registro en {{ $tabla }}</h2>

        <form method="POST" action="{{ route('admin.update', [$tabla, $registro->id]) }}">
            @csrf
            @method('PUT')

            @foreach ($registro as $columna => $valor)
                <div>
                    <label for="{{ $columna }}">{{ $columna }}:</label>
                    @if ($columna === 'id')
                        <input type="text" id="{{ $columna }}" name="{{ $columna }}" value="{{ $valor }}"
                            readonly>
                    @elseif($columna === 'password')
                        <input type="text" id="{{ $columna }}" name="{{ $columna }}">
                        @error($columna)
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Error de registro',
                                    text: "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un carácter especial.",
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            });
                        </script>
                        @enderror
                    @else
                        <input type="text" id="{{ $columna }}" name="{{ $columna }}"
                            value="{{ $valor }}">
                            @error($columna)
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Error de registro',
                                    text: "{{ $message }}",
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            });
                        </script>
                        @enderror
                    @endif
                </div>
            @endforeach


            <button type="submit">Guardar</button>
        </form>
    </div>
@endsection
