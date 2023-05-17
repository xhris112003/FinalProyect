@extends('layouts.RegisterTpl')

<body>
  <div class="desktop-2">
    <div class="mm-wrapper">
      <a href="{{route ('/')}}" class="mm"><img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a>
    </div>
    <div class="desktop-2-inner">
      <form class="group-wrapper" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="rectangle-parent">
          <div class="group-child">
            <div class="regstrate">REGÍSTRATE</div>

            <div class="form-group">
              <label for="email">Correo electrónico</label>
              <input class="group-item" placeholder="Correo electrónico" id="email" type="email" name="email" value="{{ old('email') }}" autofocus required autocomplete="email">
            </div>

            <div class="form-group">
              <label for="name">Nombre</label>
              <input id="name" class="group-inner" type="text" placeholder="Nombre de usuario" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>

            <div class="form-group">
              <label for="password">Contraseña</label>
              <input id="password" type="password" class="rectangle-input" placeholder="Contraseña" name="password" required autocomplete="new-password">
            </div>

            <div class="form-group">
              <label for="password-confirm">Confirma contraseña</label>
              <input id="password-confirm" class="group-child1" type="password" placeholder="Repite la contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="select custom-select">
              <select name="genero" required>
                <option value="">Seleccione el género</option>
                <option value="male">Masculino</option>
                <option value="female">Femenino</option>
                <option value="other">Otro</option>
              </select>
            </div>
            <div class="condiciones">
              <div class="cajas">
                <input class="opciones" type="checkbox" required>
                <div class="politica">
                  <p>
                    Acepto la Política de Privacidady consiento la
                    tratamiento de mis datos personales en de acuerdo con ello.
                  </p>
                </div>
              </div>
              <div class="cajas">
                <input class="opciones1" type="checkbox" required>
                <div class="terminos">
                  <p>
                    Tengo al menos 16 años y acepto los Términos de Usar.
                  </p>
                </div>
              </div>
            </div>

            <button type="submit" class="rectangle-group registrarse rectangle">
              Registrarse
              <div class="registrarse-wrapper">
              </div>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

<style>

</style>

</html>