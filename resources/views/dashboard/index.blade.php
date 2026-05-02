<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="sidebar">
    <h3>Gestión Jubilaciones</h3>

    <ul>
        <li>Inicio</li>
        <li>Trabajadores</li>
        <li>Solicitudes</li>
        <li>Expedientes</li>
        <li>Reportes</li>
    </ul>
</div>

<div class="main">
    <h1>Panel de Gestión Integral</h1>

    <div class="cards">
        <div class="card-box">
            <h3>Total Trabajadores</h3>
            <p>1240</p>
        </div>

        <div class="card-box">
            <h3>Pendientes</h3>
            <p>45</p>
        </div>

        <div class="card-box">
            <h3>Aprobadas</h3>
            <p>82</p>
        </div>

        <div class="card-box">
            <h3>Rechazadas</h3>
            <p>12</p>
        </div>
    </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
