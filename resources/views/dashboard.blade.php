@extends('layouts.dashboardTpl')
<body>
    <div class="dashboard">
      <div class="dashboard-inner">
        <div class="frame-wrapper">
          <div class="mm-parent">
            <div class="mm">mm</div>
            <div class="pelculas-parent">
              <a class="pelculas">Películas</a>
              <a class="acerca-de">Acerca de </a>
              <a class="series">Series</a>
            </div>
            <div  class="group-parent">
              <button onclick="window.location.href='/profile'" class="rectangle-parent">
                <div class="rectangle"></div>
                <div class="logout-wrapper">
                  <div class="logout">PERFIL</div>
                </div>
              </button>
              <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="rectangle-group">
                <div class="rectangle1"></div>
                <div class="logout-container">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  <div class="logout1">LOGOUT</div>
                </div>
              </button>
            </div>
            <button class="image-3-wrapper">
              <img class="image-3-icon" alt="" src="https://i.postimg.cc/J0wfG2Vg/icons8-men-30.png" />
            </button>
          </div>
        </div>
      </div>
      <div class="dashboard-child">
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
    </div>
  </body>
</html>