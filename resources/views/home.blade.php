@extends('layouts.homeTpl')
<body>
    <div class="home">
      <div class="home-inner">
        <div class="frame-wrapper">
          <div class="mm-parent">
            <div class="mm">mm</div>
            <div class="pelculas-parent">
              <a class="pelculas">Películas</a>
              <a class="acerca-de">Acerca de </a>
              <a class="series">Series</a>
            </div>
            <div  class="group-parent">
              <button onclick="window.location.href='/login'" class="rectangle-parent">
                <div class="rectangle"></div>
                <div class="iniciar-sesin-wrapper">
                  <div class="iniciar-sesin">INICIAR SESIÓN</div>
                </div>
              </button>
              <button onclick="window.location.href='/register'" class="rectangle-group">
                <div class="rectangle1"></div>
                <div class="registrarse-wrapper">
                  <div class="registrarse">registrarse</div>
                </div>
              </button>
            </div>
            <button class="image-3-wrapper">
              <img class="image-3-icon" alt="" src="https://i.postimg.cc/J0wfG2Vg/icons8-men-30.png" />
            </button>
          </div>
        </div>
      </div>
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
              <div class="iniciar-cuestionario">INICIAR CUESTIONARIO</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
