@extends('layouts.ProfileTpl')

<body>
  <div class="desktop-1">
    <div class="desktop-1-inner">
      <div class="frame-wrapper">
        <div class="mm-parent">
          <div class="mm"><a href="{{route('dashboard')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"></a></div>
          <div class="pelculas-parent">
            <a class="pelculas"  action="{{ route('peliculas') }}">Películas</a>
            <a class="acerca-de">Acerca de </a>
            <a class="series">Series</a>
          </div>
          <button class="group-wrapper" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="rectangle-parent">
              <div class="rectangle"></div>
              <div class="logout-wrapper">
                <div class="logout">LOGOUT</div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </div>
          </button>
          <button class="image-3-wrapper">
            <img class="image-3-icon" alt="" src="./public/image-3@2x.png" />
          </button>
        </div>
      </div>
    </div>
    <div class="frame-parent">
      <div class="profile-parent">
        <img class="profile-icon" alt="" src="./public/profile@2x.png" />

        <div class="name">{{ $name }}</div>
      </div>
      <div class="datos-personales-parent">
        <div class="datos-personales">Datos Personales:</div>
        <div class="correo-electrnico-ngomezcep-container">
          <p class="correo-electrnico-ngomezcep">
            <span class="correo-electrnico">Correo electrónico: </span>
            <span>{{ $email }}</span>
          </p>
          <p class="correo-electrnico-ngomezcep">
            <span class="correo-electrnico">Sexo: </span>
            <span>{{ $genero }} </span>
          </p>
        </div>
        <button class="edit-profile">
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
