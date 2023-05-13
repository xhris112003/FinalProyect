@extends('layouts.LoginTpl')

<body>
  <div class="frame-parent">
    <div class="mm-wrapper">

      <div class="mm"><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>
    </div>
    <div class="group-wrapper">

      <form class="vector-parent" method="POST" action="{{ route('login') }}">
        @csrf
        <img class="group-child" alt="" src="https://i.postimg.cc/8PTD3Ng0/0fa983f7-3a5e-4b1b-afb3-43b9f0f1a328-1682458505348866027.png" />

        <div class="iniciar-sesin1">INICIAR SESIÓN</div>

        <a href="{{route('register')}}" class="no-tienes-cuenta-an-parent">
          <div class="no-tienes-cuenta">¿No tienes cuenta aún?</div>
          <div class="registrate">Registrate</div>
          <div class="registrate"></div>
        </a>
        <input id="email" name="email" class="group-inner" type="email" placeholder="Correo electronico" value="{{ old('email') }}" required autocomplete="email" autofocus />

        <input id="password" class="group-item" type="password" placeholder="Constraseña" name="password" required autocomplete="current-password" />
        @if ($errors->has('password'))
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
              icon: 'error',
              title: 'Error de contraseña',
              text: "{{ $errors->first('password') }}",
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Aceptar'
            });
          });
        </script>
        @endif
        <button type="submit" class="rectangle-parent">
          <div class="rectangle"></div>
          <div class="iniciar-sesin-wrapper">
            <div class="iniciar-sesin">INICIAR SESIÓN</div>
          </div>
        </button>


      </form>
    </div>
  </div>
</body>

</html>
