@extends('layouts.home')
  <body>
    <div class="home">
      <img class="image-icon3" alt="" src="https://i.postimg.cc/xC8QXtqC/19b9bec76dc4f4653eb05135270b836e-1.jpg" />

      <div class="rectangle-container">
        <div class="rectangle2"></div>

        <div class="pelculas-group">
          <a class="pelculas1">Películas</a>
          <a class="acerca-de1">Acerca de </a>
          <a class="series1">Series</a>
        </div>
        <a class="mm2">mm</a>
        <button onclick="window.location.href='/login'" class="group-button">
          <div class="rectangle3"></div>
          <div class="iniciar-sesin-wrapper">
            <div class="iniciar-sesin">INICIAR SESIÓN</div>
          </div>
        </button>
        <button onclick="window.location.href='/register'" class="rectangle-parent1">
          <div class="rectangle3"></div>
          <div class="iniciar-sesin-wrapper">
            <div class="iniciar-sesin">registrarse</div>
          </div>
        </button>
      </div>
      <div class="no-sabes-qu">¿No sabes qué película ver?</div>
      <div class="completa-nuestro-cuestionario">
        ¡Completa nuestro cuestionario y descubre tu próxima película favorita!
      </div>
      <button class="rectangle-parent2">
        <div class="rectangle5"></div>
        <div class="iniciar-cuestionario-wrapper">
          <div class="iniciar-cuestionario">INICIAR CUESTIONARIO</div>
        </div>
      </button>
    </div>
  </body>
</html>
