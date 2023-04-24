@extends('layouts.cssLogin')
<header>
  <nav>
    <b><a href="{{route('home')}}">MM</a></b>
  </nav>
</header>

<body>
  <div id="login">
    <form action="{{ route('login') }}" method="POST" id="form">
      @csrf
      <b>
        <p>INICIAR SESION</p>
      </b>
      <input id="email" type="email" name="email" placeholder="Correo electronico" value="{{ old('email') }}" required autocomplete="email" autofocus>
      <input id="password" type="password" name="password" placeholder="Contraseña" required autocomplete="current-password">
      <p id="register-text">¿No tienes cuenta aún? <a href="{{ route('register') }}">Registrate</a> con nosotros</p>
      <button type="submit">INICIAR SESIÓN</button>
    </form>
  </div>

</body>

</html>
