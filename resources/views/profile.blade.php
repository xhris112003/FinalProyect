@extends('layouts.ProfileTpl')
<body>
    <div class="desktop-1">
      <div class="desktop-1-inner">
        <div class="frame-wrapper">
          <div class="mm-parent">
            <a class="mm1">mm</a>
            <div class="pelculas-parent">
              <a class="pelculas">Películas</a>
              <a class="acerca-de">Acerca de </a>
              <a class="series">Series</a>
            </div>
            <button class="group-container">
              <div class="rectangle-container">
                <div class="rectangle1"></div>
                <div class="logout-wrapper">
                  <div class="logout">LOGOUT</div>
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

          <div class="natalie-gmez">NATALIE GÓMEZ</div>
        </div>
        <div class="datos-personales-parent">
          <div class="datos-personales">Datos Personales:</div>
          <div class="correo-electrnico-ngomezcep-container">
            <p class="correo-electrnico-ngomezcep">
              <span class="sexo">Correo electrónico: </span>
              <span>ngomez.cep@gmail.com</span>
            </p>
            <p class="correo-electrnico-ngomezcep">
              <span class="sexo">Sexo: </span>
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
