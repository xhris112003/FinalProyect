@extends('layouts.peliculasTpl')

  <body>
   <!-- <nav class="navbar sticky-top navbar-expand-lg bg-transparent">
      <div class="container-fluid">
        <div class="mm"><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>
        
      </div>
    </nav>-->
    

     <nav class="home-inner">
      <div class="frame-wrapper">
        <div class="mm-parent">
          <div class="mm"><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>
          <div class="pelculas-parent">
            
            <a class="acerca-de">Acerca de </a>
            <a class="series">Series</a>
          </div>
          <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-expanded="false"
                >Explorar películas</a
              >
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="estrenos.html"
                    >Últimos estrenos</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="pelisMejorV.html"
                    >Películas mejor valoradas</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-expanded="false"
                >Explorar series</a
              >
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="seriesPopulares.html"
                    >Series populares</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="seriesMejorV.html"
                    >Series mejor valoradas</a
                  >
                </li>
              </ul>
            </li>
          </ul>
         
        </div>
          <div 1 class="group-parent">
            <button onclick="window.location.href='/login'" class="rectangle-parent">
              <div class="rectangle"></div>
              <div class="iniciar-sesin-wrapper">
                <div class="iniciar-sesin">INICIAR SESIÓN</div>
              </div>
            </button>
            <button onclick="window.location.href='/register'" class="rectangle-group">
              <div class="rectangle1"></div>
              <div class="registrarse-wrapper">
                <div class="registrarse">Registrarse</div>
              </div>
            </button>
          </div>
          <button class="image-3-wrapper">
            <img class="image-3-icon" alt="" src="https://i.postimg.cc/J0wfG2Vg/icons8-men-30.png" />
          </button>
        </div>
      </div>
    </nav>
    <form class="d-flex" role="search" id="form">
            <input
              class="form-control me-2"
              id="buscador"
              type="search"
              placeholder="Buscar"
              aria-label="Buscar"
            />
            <button class="btn btn-outline-success" type="submit">
              Enviar
            </button>
          </form>
    <h1 class="section">Películas populares</h1>
    <div id="contenedorCards"> </div>

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

    <script src="{{ asset('js/peliculas.js') }}"></script>
  </body>
</html>