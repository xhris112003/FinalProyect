@extends('layouts.dashboard')
  <body>
    <div class="home">
      <img class="image-icon3" alt="" src="https://i.postimg.cc/xC8QXtqC/19b9bec76dc4f4653eb05135270b836e-1.jpg" />

      <div class="rectangle-container">
        <div class="rectangle-container"></div>
      </div>
      <div class="mm2">mm</div>
      <div class="no-sabes-qu">¿No sabes qué película ver?</div>
      <div class="completa-nuestro-cuestionario">
        ¡Completa nuestro cuestionario y descubre tu próxima película favorita!
      </div>
      <button class="group-button">
        <div class="rectangle3"></div>
        <div class="iniciar-cuestionario-wrapper">
          <div class="iniciar-cuestionario">INICIAR CUESTIONARIO</div>
        </div>
      </button>
      <div class="vector-parent">

        <div class="pelculas-group">
          <a class="pelculas1">Películas</a>
          <a class="acerca-de1">Acerca de </a>
          <a class="series1">Series</a>
        </div>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="rectangle-parent1">
          <div class="rectangle4"></div>
          <div class="logout-wrapper">
            <div class="logout">LOGOUT</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </div>
        </button>
        <button onclick="window.location.href='/perfil'" class="rectangle-parent2">
          <div class="rectangle4"></div>
          <div class="logout-wrapper">
            <div class="logout">PERFIL</div>
          </div>
        </button>
      </div>
      <img
        class="logovectorizado-v1-page-0001-r-icon"
        alt=""
        src="https://i.postimg.cc/6pY2yNCX/352a7db08063942502e289527485e558.png"
      />
    </div>
  </body>
</html>
