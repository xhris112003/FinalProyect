@extends('layouts.editProfileTpl')
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



