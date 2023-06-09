@extends('layouts.ProfileTpl')

<body>
    <div class="desktop-1">
        <div class="desktop-1-inner">
            <div class="frame-wrapper">
                <div class="mm-parent">
                    <div class="mm"><a href="{{ route('/') }}"> <img src="img/logoMMOscuro.png" alt="MDN"
                                id="logo"></a></div>
                    <div class="pelculas-parent">
                        <a class="pelculas" href="{{ route('/') }}">Películas</a>
                        <a class="acerca-de" href="{{ route('acercade') }}">Acerca de </a>
                        <a class="series" href="{{ route('series') }}">Series</a>
                    </div>
                    <button class="group-wrapper"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                @if ($profile_photo === null)
                    <img class="profile-icon" src="{{ asset('img/icon.jpg') }}" alt="Foto de perfil">
                @else
                    <img class="profile-icon" src="{{ Storage::url($profile_photo) }}" alt="Foto de perfil">
                @endif
                <div class="name">{{ $name }}</div>
            </div>
            <div class="datos-personales-parent">
                <div class="datos-personales">Datos Personales</div>
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
                <button onclick="window.location.href='/edit-profile'" class="edit-profile">
                    <p class="edit-profile1">Editar perfil</p>
                </button>
            </div>
            <div class="estresado-parent">
                <button class="estresado1" onclick="window.location.href='/formularios-guardados'">
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
