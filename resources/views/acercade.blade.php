@extends('layouts.homeTpl')
<!DOCTYPE html>
<html>
<head>
    <title>Acerca de/Sobre nosotros</title>
    <style>

        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin: 10px;
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-member h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .team-member p {
            font-size: 16px;
        }
    </style>


</head>
<body>
    <div class="home">
        <nav class="home-inner">
          <div class="frame-wrapper">
            <div class="mm-parent">
              <div class="mm"><a href="{{route('/')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"> </a></div>
              <div class="pelculas-parent">
                <a class="pelculas" href="{{route('/')}}">Películas</a>
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
    </div>

    <h1>Acerca de</h1>

    <div class="team-member">
        <img src="{{ asset('img/icon.jpg') }}" alt="Foto del integrante 1">
        <div class="team-member-details">
            <h3>Cristian Carrasco</h3>
            <p>Para nada ha hecho casi todo el trabajo</p>
        </div>
    </div>

    <div class="team-member">
        <img src="{{ asset('img/icon.jpg') }}" alt="Foto del integrante 2">
        <div class="team-member-details">
            <h3>Natalie Gomez</h3>
            <p>Me gusta comer, los gatos y ¡¡Adri, trabaja!! >:|</p>
        </div>
    </div>

    <div class="team-member">
        <img src="{{ asset('img/icon.jpg') }}" alt="Foto del integrante 3">
        <div class="team-member-details">
            <h3>Adrian De la Fuente</h3>
            <p>Condecorado oficial por hacer el puto vago</p>
        </div>
    </div>
    <div class="team-member">
        <img src="{{ asset('img/chatgpt.png') }}" alt="Foto del integrante 3">
        <div class="team-member-details">
            <h3>CHATGPT</h3>
            <p>El Becario</p>
        </div>
    </div>
    <script>
        // Obtener los elementos del equipo por su clase
        const teamMembers = document.querySelectorAll('.team-member');

        // Recorrer cada miembro del equipo
        teamMembers.forEach(member => {
            // Agregar evento click a cada miembro
            member.addEventListener('click', () => {
                // Obtener el elemento de detalles del miembro
                const memberDetails = member.querySelector('.team-member-details');

                // Alternar la visibilidad de los detalles
                memberDetails.classList.toggle('show-details');
            });
        });

    </script>
</body>
</html>
