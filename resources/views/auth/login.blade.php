<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <title>Login</title>
</head>
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
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      <input id="password" type="password" name="password" required autocomplete="current-password">
      <p id="register-text">¿No tienes cuenta aún? <a href="{{ route('register') }}">Registrate</a> con nosotros</p>
      <button type="submit">INICIAR SESIÓN</button>
    </form>
  </div>

</body>

</html>