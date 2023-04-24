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
        <form action="" id="form">
            <b>
                <p>INICIAR SESION</p>
            </b>
            <input type="text" id="email" placeholder="Correo electronico">
            <br><br>
            <input type="text" name="" id="passwd" placeholder="Contraseña">
            <p>¿No tienes cuenta aún? <a href=""> Registrate</a> con nosotros</p>
            <button>INICIAR SESIÓN</button>
        </form>
    </div>
</body>

</html>