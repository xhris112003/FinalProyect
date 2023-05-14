@extends('layouts.detallesTpl')
<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-transparent">
        <div class="container-fluid">
            <div class="mm"><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item home">
                        <a class="nav-link home" href="pelisPopulares.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Explorar películas</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pelisPopulares.html">Películas populares</a></li>
                            <li><a class="dropdown-item" href="estrenos.html">Últimos estrenos</a></li>
                            <li><a class="dropdown-item" href="pelisMejorV.html">Películas mejor valoradas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Explorar series</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="seriesPopulares.html">Series populares</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="seriesMejorV.html">Series mejor valoradas</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="section" alt="Películas relacionadas"></h1>
    <div id="contenedorPerfil"></div>
    <div id="contenedorRecomendacion"></div>
    <footer class="footer">
        <div class="mm"><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>

        <br>
        <p>Copyright 2023 ©</p>
        <div>
            <a href="https://www.facebook.com/movie.match.9"><i class="bi bi-facebook" alt="Icono de Facebook"></i></a>
            <a href="https://twitter.com/Movie_Match"><i class="bi bi-twitter" alt="Icono de Twitter"></i></a>
            <a href="https://www.instagram.com/movie.match/"><i class="bi bi-instagram" alt="Icono de Instagram"></i></a>
        </div>
    </footer>
</body>

<script src="{{ asset('js/detalles.js') }}" defer></script>
</html>
