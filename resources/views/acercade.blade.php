<!DOCTYPE html>
<html>
<head>
    <title>Acerca de/Sobre nosotros</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
        }

        .team-member img {
            width: 150px;
            height: 150px;
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
    <h1>Acerca de</h1>

    <div class="team-member">
        <img src="{{ asset('img/icon.jpg') }}" alt="Foto del integrante 1">
        <div class="team-member-details">
            <h2>Cristian Carrasco</h2>
            <p>Para nada ha hecho casi todo el trabajo</p>
        </div>
    </div>

    <div class="team-member">
        <img src="{{ asset('img/icon.jpg') }}" alt="Foto del integrante 2">
        <div class="team-member-details">
            <h2>Natalie Gomez</h2>
            <p>Me gusta comer, los gatos y ¡¡Adri, trabaja!! >:(</p>
        </div>
    </div>

    <div class="team-member">
        <img src="{{ asset('img/icon.jpg') }}" alt="Foto del integrante 3">
        <div class="team-member-details">
            <h2>Adrian De la Fuente</h2>
            <p>Condecorado oficial por hacer el puto vago</p>
        </div>
    </div>
    <div class="team-member">
        <img src="{{ asset('img/chatgpt.png') }}" alt="Foto del integrante 3">
        <div class="team-member-details">
            <h2>CHATGPT</h2>
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
