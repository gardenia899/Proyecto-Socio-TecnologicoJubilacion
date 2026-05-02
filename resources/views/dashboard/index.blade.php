<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard SIGEJUB</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- Desarrollo rápido: Iconos Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-header">
        <div class="logo-box">🏛️</div>
        <div>
            <h3>Gestión Jubilaciones</h3>
            <span>ARQUITECTURA DE CONFIANZA</span>
        </div>
    </div>

    <nav class="sidebar-menu">
        <ul>
            <li class="active"><i data-lucide="home"></i> Inicio</li>
            <li><i data-lucide="users"></i> Trabajadores</li>
            <li><i data-lucide="file-text"></i> Solicitudes</li>
            <li><i data-lucide="folder"></i> Expedientes</li>
            <li><i data-lucide="wallet"></i> Prestaciones</li>
            <li><i data-lucide="layers"></i> Documentos</li>
            <li><i data-lucide="bar-chart-3"></i> Reportes</li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <div class="support-card">
            <p><strong>Soporte Técnico</strong></p>
            <p>¿Necesitas ayuda?</p>
            <button>Contactar</button>
        </div>
    </div>
</aside>

<main class="main-content">
    <!-- Barra Superior -->
    <header class="top-bar">
        <div class="search-container">
            <i data-lucide="search"></i>
            <input type="text" placeholder="Buscar expedientes, trabajadores...">
        </div>
        <div class="user-info">
            <i data-lucide="bell"></i>
            <i data-lucide="settings"></i>
            <div class="user-profile">
                <div class="text">
                    <span class="name">{{ Auth::user()->name }}</span>
                    <span class="role">{{ Auth::user()->role }}</span>
                </div>
                <div class="avatar">
                    <i data-lucide="user"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Título y Acción -->
    <section class="welcome-header">
        <div>
            <p class="subtitle">Bienvenido de nuevo,</p>
            <h1>Panel de Gestión Integral</h1>
        </div>
        <button class="btn-primary"><i data-lucide="plus-circle"></i> Nueva Solicitud</button>
    </section>

    <!-- Tarjetas Estadísticas -->
    <section class="stats-grid">
        <div class="stat-card">
            <div class="card-head">
                <div class="icon-wrap blue"><i data-lucide="users"></i></div>
                <span class="trend positive">+4%</span>
            </div>
            <p>TOTAL TRABAJADORES</p>
            <h2>1,240</h2>
        </div>
        <div class="stat-card">
            <div class="card-head">
                <div class="icon-wrap orange"><i data-lucide="clock"></i></div>
                <span class="trend neutral">Actual</span>
            </div>
            <p>PENDIENTES</p>
            <h2>45</h2>
        </div>
        <div class="stat-card">
            <div class="card-head">
                <div class="icon-wrap green"><i data-lucide="check-circle"></i></div>
                <span class="trend positive">+12</span>
            </div>
            <p>APROBADAS</p>
            <h2>82</h2>
        </div>
        <div class="stat-card">
            <div class="card-head">
                <div class="icon-wrap red"><i data-lucide="x-circle"></i></div>
                <span class="trend negative">-2</span>
            </div>
            <p>RECHAZADAS</p>
            <h2>12</h2>
        </div>
    </section>

    <!-- Sección Inferior Provisoria -->
    <section class="content-layout">
        <div class="recent-activity">
            <h3><i data-lucide="history"></i> Actividad Reciente</h3>
            <div class="activity-item">
                <div class="activity-icon"><i data-lucide="file-up"></i></div>
                <div class="activity-text">
                    <p><strong>Juan Pérez subió su cédula</strong></p>
                    <span>Expediente #9923 • Hace 15 minutos</span>
                </div>
                <a href="#">Ver</a>
            </div>
            <!-- ... más items ... -->
        </div>

        <div class="quick-access">
            <h3>Accesos Rápidos</h3>
            <div class="access-grid">
                <div class="access-box"><i data-lucide="users"></i><p>TRABAJADORES</p></div>
                <div class="access-box"><i data-lucide="briefcase"></i><p>PRESTACIONES</p></div>
                <div class="access-box"><i data-lucide="pie-chart"></i><p>REPORTES</p></div>
                <div class="access-box"><i data-lucide="help-circle"></i><p>GUÍAS</p></div>
            </div>
        </div>
    </section>

    <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
        @csrf
        <button class="btn-logout">Cerrar sesión</button>
    </form>
</main>

<script>lucide.createIcons();</script>
</body>
</html>