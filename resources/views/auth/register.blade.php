<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/register.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Register</title>
</head>
<header>
    <nav>
        <b><a href="{{route('home')}}">MM</a></b>
    </nav>
</header>

<body>
    <div id="login">
        <form action="{{ route('register') }}" method="POST" id="form">
            @csrf
            <b>
                <p>REGÍSTRATE</p>
            </b>
            <input id="email" type="email" placeholder="Correo electronico" name="email" value="{{ old('email') }}" required autocomplete="email">
            <input id="name" type="text" placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <input id="password" type="password" placeholder="Contraseña"  name="password" required autocomplete="new-password">
            <input id="password-confirm" type="password" placeholder="Repite contraseña"  name="password_confirmation" required autocomplete="new-password">
            <div class="checkbox-wrapper">
                <div>
                    <input type="checkbox" id="checkbox" required>
                    <label for="checkbox">Tengo al menos 16 años y acepto los <b>Términos de
                            Usar.</b></label>
                </div>
                <div>
                    <input type="checkbox" id="checkbox" required>
                    <label for="checkbox">Acepto la <b>Política de Privacidad</b> y consiento la
                        tratamiento de mis datos personales en
                        de acuerdo con ello.</label>
                </div>

            </div>
            <button>REGISTRARSE</button>
        </form>
    </div>
</body>

</html>