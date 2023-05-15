@extends('layouts.homeTpl')

<body>
  <div class="home">
    <nav class="home-inner">
      <div class="frame-wrapper">
        <div class="mm-parent">
          <div class="mm"><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>
          <div class="pelculas-parent">
            <a class="pelculas" href="{{route('peliculas')}}">Películas</a>
            <a class="acerca-de" href="{{route('acercade')}}">Acerca de </a>
            <a class="series" href="{{route('series')}}">Series</a>
          </div>
          <div class="group-parent">
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
    <div class="home-child">
      <div class="no-sabes-qu-pelcula-ver-parent">
        <div class="no-sabes-qu">¿No sabes qué película ver?</div>
        <div class="completa-nuestro-cuestionario">
          ¡Completa nuestro cuestionario y descubre tu próxima película
          favorita!
        </div>

        <div class="rectangle-container">
          <div class="rectangle2"></div>
          <div class="iniciar-cuestionario-wrapper">
            <a href="{{route('cuestionario')}}" class="iniciar-cuestionario">INICIAR CUESTIONARIO</a>
          </div>
        </div>
      </div>
    </div>
 
  <footer class="footer">
      <div><a href="{{route('home')}}"> <img src="img/logoMMOscuro.png" alt="MDN" class="logo-footer"> </a></div>
      <div >
      <p class="copy">Copyright 2023 © MovieMatch</p>
      <p>All Rights Reserved - Todos los derechos reservados</p>
      </div>
        <div>
          <a href="https://www.facebook.com/movie.match.9"><i class="bi bi-facebook" alt="Icono de Facebook"></i></a>
          <a href="https://twitter.com/Movie_Match"><i class="bi bi-twitter" alt="Icono de Twitter"></i></a>
          <a href="https://www.instagram.com/movie.match/"><i class="bi bi-instagram" alt="Icono de Instagram"></i></a>
        </div>
    </footer>
    </div>
</body>

</html>