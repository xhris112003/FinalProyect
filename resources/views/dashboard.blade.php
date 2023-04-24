<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieMatch</title>
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Gurmukhi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<header>
    <nav>
        <b><a href="{{route('dashboard')}}">MM</a></b>
        <a href="">PELÍCULAS</a>
        <a href="">SERIES</a>
        <a href="">ACERCA DE</a>
        <div id="buttons">
            <button onclick="window.location.href='/perfil  '" id="perfil">PERFIL</button>
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

        </div>
    </nav>
</header>

<body>
    <div id="BodyText">
        <p>¿No sabes qué película ver? </p>
        <p> ¡Completa nuestro cuestionario y</p>
        <p>descubre tu próxima película favorita!</p>
        <button id="cuestionario">INICIAR CUESTIONARIO</button>
    </div>
</body>

</html>
