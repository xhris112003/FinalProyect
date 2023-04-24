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
        <form action="" id="form">
            <b>
                <p>REGÍSTRATE</p>
            </b>
            <input type="text" id="email" placeholder="Correo electronico">
            <input type="text" id="user" placeholder="Nombre de Usuario">
            <input type="text" id="passwd" placeholder="Contraseña">
            <input type="text" id="passwd" placeholder="Repite contraseña">
            <div class="checkbox-wrapper">
                <div>
                    <input type="checkbox" id="checkbox">
                    <label for="checkbox">Tengo al menos 16 años y acepto los <b>Términos de
                            Usar.</b></label>
                </div>
                <div>
                    <input type="checkbox" id="checkbox">
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