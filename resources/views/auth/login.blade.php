@extends('layouts.cssLogin')
<body>
    <div class="login">
      <div class="rectangle2"></div>
      <img class="bb-icon" alt="" src="https://i.postimg.cc/KcddrZRx/c2f25cea1748625a20598aac1f20ac39.jpg" />

      <form class="group-parent" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="vector-parent">

          <div class="iniciar-sesin">INICIAR SESIÓN</div>
          <input id="email" type="email" class="group-inner" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          <input id="password" type="password" class="rectangle-input" name="password" required autocomplete="current-password">


        </div>
        <a class="con-nosotros-parent">
          <div class="con-nosotros">con nosotros</div>
          <div class="registrate">Registrate</div>
          <div class="no-tienes-cuenta">¿No tienes cuenta aún?</div>
        </a>
        <button type="submit" class="rectangle-container">
          <div class="rectangle3"></div>
          <div class="iniciar-sesin-wrapper">
            <div class="iniciar-sesin1">INICIAR SESIÓN</div>
          </div>
        </button>
      </form>
      <div class="rectangle2"></div>

      <div class="copyright-1998-2021">
        Copyright © 1998-2021 MovieMatch Todos los derechos reservados
      </div>
      <a class="mm2">mm</a>
    </div>
  </body>
</html>
