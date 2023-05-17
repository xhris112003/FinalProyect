@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Crear registro en {{ $tabla }}</h2>

        <form method="POST" action="{{ route('admin.store', [$tabla, 'valor' => true]) }}">
            @csrf

            @foreach ($columnas as $columna)
                @if ($columna === 'id')
                    <div class="form-group">
                        <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}" hidden>
                    </div>
                @elseif($columna === 'remember_token')
                    <div class="form-group">
                        <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}"
                            hidden>
                    </div>
                @elseif($columna === 'created_at')
                    <div class="form-group">
                        <label for="{{ $columna }}">{{ $columna }}:</label>
                        <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}"
                            value="{{ date('Y-m-d H:i:s') }}" readonly>
                    </div>
                @elseif($columna === 'updated_at')
                    <div class="form-group">
                        <label for="{{ $columna }}">{{ $columna }}:</label>
                        <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}"
                            value="{{ date('Y-m-d H:i:s') }}" readonly>
                    </div>
                @elseif($columna === 'password')
                    <div class="form-group">
                        <label for="{{ $columna }}">{{ $columna }}:</label>
                        <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}"
                            required>
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
                    </div>
                @else
                    <div class="form-group">
                        <label for="{{ $columna }}">{{ $columna }}:</label>
                        <input type="text" class="form-control" id="{{ $columna }}" name="{{ $columna }}"
                            required>
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
                    </div>
                @endif
            @endforeach

            <button type="submit" class="btn btn-primary">Crear Usuario</button>
            <button type="submit" name="valor" value="false" class="btn btn-primary">Crear Administrador</button>
        </form>


    </div>
@endsection
