@extends('layouts.RegisterTpl')

<body>
    <div class="desktop-2">
        <div class="mm-wrapper">
            <a href="{{ route('/') }}" class="mm"><img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a>
        </div>
        <div class="desktop-2-inner">
            <form class="group-wrapper" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="rectangle-parent">
                    <div class="group-child"></div>
                    <div class="regstrate">REGÍSTRATE</div>

                    <div class="acepto-la-poltica-container">
                        <p class="acepto-la-poltica-de-privacid">
                            <span class="acepto-la">Acepto la</span>
                            <span class="poltica-de-privacidad">
                                Política de Privacidad</span>
                            <span class="acepto-la"> y consiento la </span>
                        </p>
                        <p class="tratamiento-de-mis">
                            tratamiento de mis datos personales en
                        </p>
                        <p class="tratamiento-de-mis">de acuerdo con ello.</p>
                    </div>
                    <input class="opciones" type="checkbox" required>
                    <div class="tengo-al-menos-container">
                        <p class="acepto-la-poltica-de-privacid">
                            <span class="acepto-la">Tengo al menos 16 años y acepto los
                            </span>
                            <span class="poltica-de-privacidad">Términos de </span>
                        </p>
                        <p class="acepto-la-poltica-de-privacid">
                            <span class="poltica-de-privacidad">Usar</span>
                            <span class="acepto-la">.</span>
                        </p>
                    </div>


                    <input class="group-item" placeholder="Correo electrónico" id="email" type="email"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @if ($errors->has('email'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Error de registro',
                                    text: "Este email ya esta registrado!",
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            });
                        </script>
                    @endif

                    <input id="name" class="group-inner" type="text" placeholder="Nombre de usuario"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    <input id="password" type="password" class="rectangle-input" placeholder="Contraseña"
                        name="password" required autocomplete="new-password">
                    @if ($errors->has('password'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Error de registro',
                                    text: "{{ $errors->first('password') }}",
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            });
                        </script>
                    @endif
                    <input id="password-confirm" class="group-child1" type="password" placeholder="Repite la contraseña"
                        class="form-control" name="password_confirmation" required autocomplete="new-password">

                    <select class="select custom-select" name="genero" required>
                        <option value="">Seleccione el género</option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                        <option value="other">Otro</option>
                    </select>

                    <input class="opciones1" type="checkbox" required>
                    <button type="submit" class="rectangle-group">
                        <div class="rectangle"></div>
                        <div class="registrarse-wrapper">
                            <div class="registrarse">registrarse</div>
                        </div>
                    </button>


                </div>
            </form>
        </div>
    </div>
</body>

</html>
