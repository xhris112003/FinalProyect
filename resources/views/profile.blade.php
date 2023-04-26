@extends('layouts.profileTpl')
<body>
    <div class="desktop-1">
      <div class="desktop-1-inner">
        <div class="frame-wrapper">
          <div class="mm-parent">
            <a href="{{ route('dashboard') }}" class="mm">mm</a>
            <div class="pelculas-parent">
              <a class="pelculas">Películas</a>
              <a class="acerca-de">Acerca de </a>
              <a class="series">Series</a>
            </div>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="group-wrapper">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                <div class="rectangle-parent">
                <div class="rectangle"></div>
                <div class="logout-wrapper">
                  <div class="logout">LOGOUT</div>
                </div>
              </div>
            </button>
            <button class="image-3-wrapper">
              <img class="image-3-icon" alt="" src="https://i.postimg.cc/J0wfG2Vg/icons8-men-30.png" />
            </button>
          </div>
        </div>
      </div>
      <div class="frame-parent">
        <div class="profile-parent">
          <img class="profile-icon" alt="" src="https://i.postimg.cc/sDTGqgJt/823f515c-8143-4044-8f13-85ea1ef58f3a-16-9-discover-aspect-ratio-default-0.jpg" />

          <div class="natalie-gmez">NATALIE GÓMEZ</div>
        </div>
        <div class="datos-personales-parent">
          <div class="datos-personales">Datos Personales:</div>
          <div class="correo-electrnico-ngomezcep-container">
            <p class="correo-electrnico-ngomezcep">
              <span class="correo-electrnico">Correo electrónico: </span>
              <span>ngomez.cep@gmail.com</span>
            </p>
            <p class="correo-electrnico-ngomezcep">
              <span class="correo-electrnico">Sexo: </span>
              <span>Femenino </span>
            </p>
            <p class="ubicacin-barcelona">Ubicación: Barcelona</p>
          </div>
          <button class="edit-profile">
            <div class="edit-profile-child"></div>
            <b class="edit-profile1">Edit profile</b>
          </button>
        </div>
        <div class="estresado-parent">
          <button class="estresado">
            <div class="estresado-inner">
              <div class="instance-child"></div>
            </div>
            <div class="boton">PREFERENCIAS</div>
          </button>
          <button class="estresado1">
            <div class="estresado-inner">
              <div class="instance-child"></div>
            </div>
            <div class="boton">CUESTIONARIOS REALIZADOS</div>
          </button>
        </div>
      </div>
      <div class="desktop-1-child">
        <div class="frame-group">
          <div class="description-wrapper">
            <div class="datos-personales">Tus Favoritos</div>
          </div>
          <div class="image-parent">
            <a class="image"> </a>
            <a class="image1"> </a>
            <a class="image2"> </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
