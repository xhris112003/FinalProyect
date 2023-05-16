<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Anek Gurmukhi:wght@400;600;800&display=swap"
    />
        
    <style>
        /* Estilos generales */
        body {
            background-color: #1c1c1c;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 1.25rem 3.13rem;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Estilos del nav */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .nav-logo {
            width: 100px;
        }

        .nav-links {
            display: flex;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        .nav-links a:last-child {
            margin-right: 0;
        }

        .logout-btn {
            background-color: #00c030;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilos del formulario de edición de perfil */
        .profile-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-family: "Anek Gurmukhi";
        }
        .form-group input::placeholder{
            font-family: "Anek Gurmukhi";

        }

        .save-btn {
            background-color: #00c030;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        #logo{
            width: 55px;
            height: auto;
        }
        .mm-parent {
            flex: 1;
            display: flex;
            flex-direction: row;
            padding: 1.25rem 3.13rem;
            align-items: center;
            justify-content: space-between;
        }
        
        
    </style>
</head>

<body>
    <div class="mm-parent">
      <div class="mm"><a href="{{route ('/')}}"> <img src="img/logoMMOscuro.png" alt="MDN" id="logo"></a></div>
    </div>
      <h1>Editar Perfil</h1>

      <form class="profile-form" action="{{ route('profile.edit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" placeholder="Nombre" name="name" value="{{ Auth::user()->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" placeholder="Correo electrónico" value="{{ Auth::user()->email }}" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" placeholder="Contraseña" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirmar Contraseña</label>
            <input type="password" id="confirm_password" placeholder="Confirmar Contraseña" name="password_confirmation" required>
        </div>
        <button class="save-btn" type="submit">Guardar</button>
    </form>

    </div>
</body>

</html>



