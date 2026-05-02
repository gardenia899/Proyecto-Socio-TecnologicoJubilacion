<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="login-container">
    <div class="card">
        <h2>Gestión Jubilaciones</h2>
        <p>Accede a tu cuenta</p>

        <form method="POST" action="/login">
            @csrf

            <div class="input-group">
                <label>Usuario</label>
                <input type="text" name="email" required>
            </div>

            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>

            <button class="btn">Entrar</button>
        </form>
    </div>
</div>

</body>
</html>
