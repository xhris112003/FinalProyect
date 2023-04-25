@extends('layouts.profile')
  <body>
    <div class="perfil">
      <div class="rectangle-parent">
        <div class="rectangle-parent"></div>
      </div>
      <div class="nav-parent">

        <div class="pelculas-parent">
          <a class="pelculas">Películas</a>
          <a class="acerca-de">Acerca de </a>
          <a class="series">Series</a>
        </div>
        <a class="mm1" href="/dashboard">mm</a>
        <div class="rectangle-group">
          <button class="rectangle1"></button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
          </form>
          <button class="perfil1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</button>
        </div>
      </div>
      <div class="description">Tus Favoritos</div>
      <div class="description1">
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
      <img class="image-icon" alt="" src="https://i.postimg.cc/DZSCY4JZ/4165ceef91b1fd536ed92178e3e284d9.jpg" />

      <img class="image-icon1" alt="" src="https://i.postimg.cc/8PxrhJD4/abf3fb5d88365be6739bb569d8259b76.jpg" />

      <img class="image-icon2" alt="" src="https://i.postimg.cc/kX2TJbfv/452420e41bb5b2f260139b9ccf3f8478.jpg" />

      <div class="description2">Datos personales</div>
      <div class="estresado">
        <button class="estresado-inner">
          <div class="instance-child"></div>
        </button>
        <div class="boton">CUESTIONARIOS REALIZADOS</div>
      </div>
      <div class="estresado1">
        <button class="estresado-inner">
          <button class="instance-item"></button>
        </button>
        <div class="boton">PREFERENCIAS</div>
      </div>
      <img class="profile-icon" alt="" src="https://i.postimg.cc/ZRXNYCfC/bae0f2fe0bf2f24074022fd8fc52d500.jpg" />
    </div>
  </body>
</html>
