<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIGEJUB - Sistema de Jubilaciones</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Estilos rápidos para funcionalidad de pestañas */
        .content-section { display: none; animation: fadeIn 0.3s ease; }
        .content-section.active { display: block; }
        .menu-item { cursor: pointer; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        
        /* Ajustes estéticos para parecerse a las imágenes */
        .status-badge { padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; }
        .status-activo { background: #e6fcf5; color: #0ca678; }
        .status-jubilado { background: #e7f5ff; color: #1c7ed6; }
        .status-suspension { background: #fff5f5; color: #fa5252; }
        .data-card { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-header">
        <div class="logo-box" style="background: #1a365d; color: white; padding: 8px; border-radius: 8px;">🏛️</div>
        <div>
            <h3 style="margin:0; font-size: 1.1rem;">Gestión Jubilaciones</h3>
            <span style="font-size: 0.7rem; color: #667085;">ARQUITECTURA DE CONFIANZA</span>
        </div>
    </div>

    <nav class="sidebar-menu">
        <ul>
            <li class="menu-item active" data-target="inicio"><i data-lucide="home"></i> Inicio</li>
            <li class="menu-item" data-target="trabajadores"><i data-lucide="users"></i> Trabajadores</li>
            <li class="menu-item" data-target="solicitudes"><i data-lucide="file-text"></i> Solicitudes</li>
            <li class="menu-item" data-target="expedientes"><i data-lucide="folder"></i> Expedientes</li>
            <li class="menu-item" data-target="prestaciones"><i data-lucide="wallet"></i> Prestaciones</li>
            <li class="menu-item" data-target="reportes"><i data-lucide="bar-chart-3"></i> Reportes</li>
        </ul>
    </nav>

    <div class="sidebar-footer" style="padding: 20px;">
        <div class="user-profile-mini" style="display: flex; align-items: center; gap: 10px;">
            <div class="avatar" style="width: 35px; height: 35px; border-radius: 50%; background: #eee; display:flex; align-items:center; justify-content:center;">
                <i data-lucide="user" size="18"></i>
            </div>
            <div>
                <p style="margin:0; font-size: 0.85rem; font-weight: bold;">{{ Auth::user()->name }}</p>
                <span style="font-size: 0.75rem; color: #666;">{{ Auth::user()->role }}</span>
            </div>
        </div>
    </div>
</aside>

<main class="main-content">
    <header class="top-bar">
        <div class="search-container">
            <i data-lucide="search"></i>
            <input type="text" placeholder="Buscar por nombre o cédula...">
        </div>
        <div class="user-info" style="display:flex; gap: 20px; align-items: center;">
            <i data-lucide="bell"></i>
            <i data-lucide="settings"></i>
            <span style="color: #1a365d; font-weight: bold;">Sistema de Jubilaciones</span>
        </div>
    </header>

    <!-- SECCIÓN 1: INICIO (Dashboard General) -->
<div id="inicio" class="content-section active">
    
    <!-- Encabezado -->
    <header class="welcome-header">
        <div class="welcome-text">
            <p class="subtitle">Bienvenido de nuevo,</p>
            <h1>Panel de Gestión Integral</h1>
        </div>
        <button class="btn-primary" onclick="switchTab('solicitudes')">
            <i data-lucide="plus-circle"></i> Nueva Solicitud
        </button>
    </header>

    <!-- Tarjetas de Estadísticas -->
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
            <h2 class="text-orange">45</h2>
        </div>

        <div class="stat-card">
            <div class="card-head">
                <div class="icon-wrap green"><i data-lucide="check-circle"></i></div>
                <span class="trend positive">+12</span>
            </div>
            <p>APROBADAS</p>
            <h2 class="text-green">82</h2>
        </div>

        <div class="stat-card">
            <div class="card-head">
                <div class="icon-wrap red"><i data-lucide="x-circle"></i></div>
                <span class="trend negative">-2</span>
            </div>
            <p>RECHAZADAS</p>
            <h2 class="text-red">12</h2>
        </div>
    </section>

    <!-- Layout Central: Gráfico y Accesos -->
    <div class="content-layout">
        <!-- Gráfico -->
        <section class="chart-container">
            <div class="chart-header">
                <div>
                    <h3>Solicitudes por Mes</h3>
                    <p class="chart-subtitle">Volumen de tramitación - Año Actual</p>
                </div>
                <div class="chart-toggle">
                    <button class="active">Mensual</button>
                    <button>Anual</button>
                </div>
            </div>
            <div class="bar-chart">
                <div class="bar-group"><div class="bar" style="height: 40%;"></div><span>ENE</span></div>
                <div class="bar-group"><div class="bar" style="height: 60%;"></div><span>FEB</span></div>
                <div class="bar-group active"><div class="bar" style="height: 90%;"><span class="val">32</span></div><span>MAR</span></div>
                <div class="bar-group"><div class="bar" style="height: 70%;"></div><span>ABR</span></div>
                <div class="bar-group"><div class="bar" style="height: 80%;"></div><span>MAY</span></div>
                <div class="bar-group"><div class="bar" style="height: 50%;"></div><span>JUN</span></div>
            </div>
        </section>

        <!-- Accesos Rápidos -->
        <section class="quick-access-dark">
            <h3>Accesos Rápidos</h3>
            <p>Gestione los procesos fundamentales de forma directa.</p>
            <div class="access-grid">
                <div class="access-box" onclick="switchTab('trabajadores')">
                    <i data-lucide="users"></i>
                    <p>TRABAJADORES</p>
                </div>
                <div class="access-box" onclick="switchTab('prestaciones')">
                    <i data-lucide="wallet"></i>
                    <p>PRESTACIONES</p>
                </div>
                <div class="access-box" onclick="switchTab('reportes')">
                    <i data-lucide="bar-chart-3"></i>
                    <p>REPORTES</p>
                </div>
                <div class="access-box">
                    <i data-lucide="help-circle"></i>
                    <p>GUÍAS</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Layout Inferior: Actividad y Vencimientos -->
    <div class="content-layout">
        <section class="recent-activity">
            <h3 class="section-title"><i data-lucide="history"></i> Actividad Reciente</h3>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon blue"><i data-lucide="file-up"></i></div>
                    <div class="activity-text">
                        <p>Juan Pérez subió su cédula</p>
                        <span>Expediente #9923 • Hace 15 min</span>
                    </div>
                    <a href="#">Ver</a>
                </div>
                <div class="activity-item">
                    <div class="activity-icon green"><i data-lucide="check-circle"></i></div>
                    <div class="activity-text">
                        <p>Solicitud #452 aprobada</p>
                        <span>Admin. Maria • Hace 2 horas</span>
                    </div>
                    <a href="#">Detalle</a>
                </div>
            </div>
        </section>

        <section class="deadlines-container">
            <div class="deadlines-card">
                <h3>Próximos Vencimientos</h3>
                <div class="deadline-item urgent">
                    <span class="tag">Urgente</span>
                    <p>Revisión de Cálculo: Ana Belén</p>
                    <span>Vence hoy, 16:00h</span>
                </div>
                <div class="deadline-item warning">
                    <span class="tag">Mañana</span>
                    <p>Firma de Dictamen #882</p>
                    <span>Pendiente de firma digital</span>
                </div>
            </div>
            <div class="info-banner-dark">
                <div class="info-head">
                    <i data-lucide="lightbulb"></i>
                    <h4>Dato Institucional</h4>
                </div>
                <p>Este mes se han procesado un 15% más de jubilaciones que el promedio anterior.</p>
            </div>
        </section>
    </div>
</div>


    <!-- SECCIÓN 2: TRABAJADORES -->
<div id="trabajadores" class="content-section">
    <header class="section-header">
        <div class="header-info">
            <h1>Directorio de Trabajadores</h1>
            <p>Gestione la información laboral y el estatus institucional de los miembros activos y jubilados.</p>
        </div>
        <button class="btn-primary-dark">
            <i data-lucide="user-plus"></i> Agregar Trabajador
        </button>
    </header>

    <!-- Filtros y Contador -->
    <section class="filters-row">
        <div class="filter-group">
            <label>FILTRAR POR CARGO</label>
            <select><option>Todos los cargos</option></select>
        </div>
        <div class="filter-group">
            <label>FILTRAR POR ESTATUS</label>
            <select><option>Cualquier estatus</option></select>
        </div>
        <div class="filter-group">
            <label>TIPO DE NÓMINA</label>
            <select><option>Todas</option></select>
        </div>
        <div class="total-badge-card">
            <div>
                <p>TOTAL REGISTRADOS</p>
                <h2>1,248</h2>
            </div>
            <i data-lucide="users" class="icon-bg"></i>
        </div>
    </section>

    <!-- Tabla de Datos -->
    <div class="data-table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE COMPLETO</th>
                    <th>CÉDULA</th>
                    <th>CARGO</th>
                    <th>TIPO</th>
                    <th>ESTATUS</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fila 1 -->
                <tr>
                    <td>TR-8821</td>
                    <td>
                        <div class="user-cell">
                            <span class="avatar blue">AG</span>
                            <strong>Ana García</strong>
                        </div>
                    </td>
                    <td>12.345.678</td>
                    <td>Profesora Titular</td>
                    <td><span class="badge-type docente">DOCENTE</span></td>
                    <td><span class="dot active"></span> Activo</td>
                    <td class="actions">
                        <i data-lucide="folder-open"></i>
                        <i data-lucide="edit-3"></i>
                        <i data-lucide="trash-2"></i>
                    </td>
                </tr>
                <!-- Fila 2 -->
                <tr>
                    <td>TR-8822</td>
                    <td>
                        <div class="user-cell">
                            <span class="avatar purple">RM</span>
                            <strong>Ricardo Mendoza</strong>
                        </div>
                    </td>
                    <td>10.122.334</td>
                    <td>Analista de Sistemas</td>
                    <td><span class="badge-type admin">ADMINISTRATIVO</span></td>
                    <td><span class="dot jubilado"></span> Jubilado</td>
                    <td class="actions">
                        <i data-lucide="folder-open"></i>
                        <i data-lucide="edit-3"></i>
                        <i data-lucide="trash-2"></i>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Paginación -->
        <div class="table-footer">
            <span>Mostrando 1 - 10 de 1,248 trabajadores</span>
            <div class="pagination">
                <button>&lt;</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <span>...</span>
                <button>125</button>
                <button>&gt;</button>
            </div>
        </div>
    </div>

    <!-- Widgets Inferiores -->
    <div class="content-layout">
        <div class="promo-card-blue">
            <div class="promo-content">
                <h3>Próximas Jubilaciones</h3>
                <p>Hay 14 docentes que cumplen los requisitos de años de servicio este trimestre. Inicie el proceso de revisión de expedientes.</p>
                <button class="btn-white">Ver Calendario</button>
            </div>
            <div class="promo-icon-watermark">
                <i data-lucide="scroll"></i>
            </div>
        </div>

        <div class="audit-card">
            <div class="audit-header">
                <i data-lucide="check-circle-2"></i> AUDITORÍA AL DÍA
            </div>
            <h3>Estatus de Datos</h3>
            <p>El 98.4% de los expedientes cuentan con documentación digitalizada completa.</p>
            <div class="progress-container">
                <div class="progress-bar" style="width: 98%;"></div>
            </div>
            <span class="progress-val">98%</span>
        </div>
    </div>
</div>


<!-- SECCIÓN 3: SOLICITUDES -->
<div id="solicitudes" class="content-section">
    <header class="section-header">
        <div class="header-info">
            <h1>Gestión de <span class="text-blue-accent">Solicitudes</span></h1>
            <p>Administre y procese nuevas peticiones de retiro institucional.</p>
        </div>
    </header>

    <!-- Formulario Crear Nueva Solicitud -->
    <section class="form-card">
        <div class="form-card-title">
            <div class="icon-plus-bg"><i data-lucide="plus" size="16"></i></div>
            <h2>Crear Nueva Solicitud</h2>
        </div>
        <form class="quick-form">
            <div class="input-grid">
                <div class="form-group">
                    <label>Seleccionar Trabajador</label>
                    <div class="input-with-icon">
                        <input type="text" placeholder="Dr. Roberto Hernández">
                        <i data-lucide="user-search" size="16"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Período de Jubilación</label>
                    <div class="input-with-icon">
                        <input type="text" placeholder="Otoño 2024">
                        <i data-lucide="calendar-range" size="16"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Fecha de Solicitud</label>
                    <input type="date">
                </div>
                <div class="form-group">
                    <label>Decisión Inicial</label>
                    <div class="input-with-icon">
                        <input type="text" value="Pendiente de Revisión" readonly>
                        <i data-lucide="flag" size="16"></i>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="reset" class="btn-link">Limpiar</button>
                <button type="submit" class="btn-primary-dark">
                    <i data-lucide="save" size="18"></i> Registrar Solicitud
                </button>
            </div>
        </form>
    </section>

    <!-- Listado de Solicitudes -->
    <section class="list-container">
        <div class="list-header">
            <div class="list-title-area">
                <h2>Listado de Solicitudes</h2>
                <div class="tab-filters">
                    <button class="active">Todas</button>
                    <button>Pendientes</button>
                    <button>Aprobadas</button>
                    <button>Rechazadas</button>
                </div>
            </div>
            <div class="list-actions">
                <button class="btn-outline"><i data-lucide="sliders-horizontal" size="16"></i> Filtros Avanzados</button>
                <button class="btn-outline"><i data-lucide="download" size="16"></i> Exportar</button>
            </div>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>FOLIO</th>
                    <th>TRABAJADOR</th>
                    <th>FECHA SOLICITUD</th>
                    <th>PERÍODO</th>
                    <th>ESTATUS</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="folio">#SOL-2024-001</td>
                    <td>
                        <div class="worker-info">
                            <strong>Dr. Roberto Hernández</strong>
                            <span>Facultad de Medicina</span>
                        </div>
                    </td>
                    <td>15 Oct 2023</td>
                    <td>Otoño 2024</td>
                    <td><span class="badge-status pending">PENDIENTE</span></td>
                    <td class="actions">
                        <i data-lucide="eye"></i>
                        <i data-lucide="edit-2"></i>
                    </td>
                </tr>
                <tr>
                    <td class="folio">#SOL-2024-002</td>
                    <td>
                        <div class="worker-info">
                            <strong>Mtra. Elena Gómez</strong>
                            <span>Dpto. de Humanidades</span>
                        </div>
                    </td>
                    <td>12 Oct 2023</td>
                    <td>Otoño 2024</td>
                    <td><span class="badge-status approved">APROBADA</span></td>
                    <td class="actions">
                        <i data-lucide="eye"></i>
                        <i data-lucide="file-text"></i>
                    </td>
                </tr>
                <tr>
                    <td class="folio">#SOL-2024-003</td>
                    <td>
                        <div class="worker-info">
                            <strong>Ing. Carlos Ruiz</strong>
                            <span>Ciencias Exactas</span>
                        </div>
                    </td>
                    <td>08 Oct 2023</td>
                    <td>Primavera 2025</td>
                    <td><span class="badge-status rejected">RECHAZADA</span></td>
                    <td class="actions">
                        <i data-lucide="eye"></i>
                        <i data-lucide="alert-triangle"></i>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="table-footer">
            <span>Mostrando 1 - 4 de 24 solicitudes</span>
            <div class="pagination">
                <button disabled>&lt;</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>&gt;</button>
            </div>
        </div>
    </section>

    <!-- Tarjetas de Métricas Inferiores -->
    <section class="metrics-row">
        <div class="metric-card">
            <div class="metric-icon orange"><i data-lucide="hourglass"></i></div>
            <div class="metric-data">
                <h3>12</h3>
                <p>ESPERANDO REVISIÓN</p>
            </div>
        </div>
        <div class="metric-card">
            <div class="metric-icon green"><i data-lucide="check-circle-2"></i></div>
            <div class="metric-data">
                <h3>158</h3>
                <p>TOTAL APROBADAS</p>
            </div>
        </div>
        <div class="metric-card">
            <div class="metric-icon blue"><i data-lucide="timer"></i></div>
            <div class="metric-data">
                <h3>4.2 días</h3>
                <p>TIEMPO PROMEDIO</p>
            </div>
        </div>
    </section>
</div>



   <!-- SECCIÓN 4: EXPEDIENTES (Basado en screen1.jpg) -->
<div id="expedientes" class="content-section">
    <!-- Migas de pan y Acciones superiores -->
    <div class="breadcrumb-area">
        <span class="breadcrumb">Expedientes > <strong>Detalle de Expediente #EXP-2024-089</strong></span>
        <div class="header-actions">
            <button class="btn-outline"><i data-lucide="printer"></i> Imprimir</button>
            <button class="btn-primary-dark"><i data-lucide="edit-3"></i> Editar Expediente</button>
        </div>
    </div>

    <h1 class="page-title">Expediente: Roberto Martínez</h1>

    <div class="expediente-grid">
        <!-- Columna Izquierda: Perfil y Requisitos -->
        <aside class="side-panel">
            <div class="profile-card">
                <div class="profile-img-container">
                    <!-- Imagen de ejemplo del trabajador -->
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Roberto" alt="Perfil" class="profile-main-img">
                    <div class="verified-badge"><i data-lucide="check"></i></div>
                </div>
                <h3>Roberto Martínez</h3>
                <p class="role-text">Docente Titular - Facultad de Ingeniería</p>
                
                <div class="info-mini-grid">
                    <div class="info-box">
                        <span class="label">CÉDULA</span>
                        <span class="val">1-0943-0231</span>
                    </div>
                    <div class="info-box">
                        <span class="label">ANTIGÜEDAD</span>
                        <span class="val">28 Años</span>
                    </div>
                    <div class="info-box">
                        <span class="label">TIPO DE JUB.</span>
                        <span class="val">Ordinaria</span>
                    </div>
                    <div class="info-box">
                        <span class="label">ESTATUS</span>
                        <span class="val text-blue">En Trámite</span>
                    </div>
                </div>
            </div>

            <div class="requirements-card">
                <h3>ESTADO DE REQUISITOS</h3>
                <div class="chart-progress-area">
                    <div class="circular-progress">
                        <span class="progress-text">4/6</span>
                    </div>
                    <div class="progress-details">
                        <strong>Requisitos Cumplidos</strong>
                        <p>Pendiente: Certificado Médico y Acta de Nacimiento Original.</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Columna Derecha: Avance, Datos y Documentos -->
        <main class="main-panel">
            <!-- Banner de Avance -->
            <div class="status-banner-dark">
                <div class="banner-top">
                    <div class="status-label">
                        <i data-lucide="check-circle-2"></i>
                        <span>Avance del Proceso</span>
                    </div>
                    <button class="btn-glass">Ver Solicitud <i data-lucide="external-link"></i></button>
                </div>
                <div class="progress-container-large">
                    <div class="progress-fill" style="width: 75%;"></div>
                </div>
                <p class="update-text">75% Completado — Última actualización hace 2 días</p>
            </div>

            <!-- Datos Personales -->
            <div class="data-card-white">
                <div class="card-header-icon">
                    <i data-lucide="user"></i> <h3>DATOS PERSONALES</h3>
                </div>
                <div class="personal-data-grid">
                    <div class="data-item">
                        <label>NOMBRE COMPLETO</label>
                        <p>Roberto Martínez Valenzuela</p>
                    </div>
                    <div class="data-item">
                        <label>CORREO ELECTRÓNICO</label>
                        <p>r.martinez@universidad.edu.mx</p>
                    </div>
                    <div class="data-item">
                        <label>FECHA DE NACIMIENTO</label>
                        <p>15 de Agosto, 1964</p>
                    </div>
                    <div class="data-item">
                        <label>TELÉFONO DE CONTACTO</label>
                        <p>+52 555 123 4567</p>
                    </div>
                    <div class="data-item full-width">
                        <label>DIRECCIÓN DE RESIDENCIA</label>
                        <p>Av. de los Insurgentes Sur 1420, Ciudad de México</p>
                    </div>
                </div>
            </div>

            <!-- Listado de Documentos -->
            <div class="documents-card">
                <div class="card-header-flex">
                    <div class="card-header-icon">
                        <i data-lucide="file-text"></i> <h3>DOCUMENTOS CARGADOS</h3>
                    </div>
                    <span class="status-tag success">Validando Documentación</span>
                </div>
                
                <div class="doc-list">
                    <!-- Documento 1 -->
                    <div class="doc-item">
                        <div class="doc-icon checked"><i data-lucide="check"></i></div>
                        <div class="doc-info">
                            <strong>Cédula de Identidad Anverso/Reverso</strong>
                            <span>PDF • 1.2 MB • Cargado el 12/03/2024</span>
                        </div>
                    </div>
                    <!-- Documento 2 -->
                    <div class="doc-item">
                        <div class="doc-icon checked"><i data-lucide="check"></i></div>
                        <div class="doc-info">
                            <strong>Certificación de Haberes (Últimos 10 años)</strong>
                            <span>XLSX • 4.5 MB • Cargado el 14/03/2024</span>
                        </div>
                    </div>
                    <!-- Documento 3 -->
                    <div class="doc-item">
                        <div class="doc-icon checked"><i data-lucide="check"></i></div>
                        <div class="doc-info">
                            <strong>Historial de Cargos y Funciones</strong>
                            <span>PDF • 850 KB • Cargado el 15/03/2024</span>
                        </div>
                    </div>
                    <!-- Documento Pendiente -->
                    <div class="doc-item pending">
                        <div class="doc-icon waiting"><i data-lucide="more-horizontal"></i></div>
                        <div class="doc-info">
                            <strong>Acta de Nacimiento Original</strong>
                            <span>Esperando documento físico o carga digital...</span>
                        </div>
                        <button class="btn-subir">Subir ahora</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

    <!-- SECCIÓN 5: PRESTACIONES -->
<div id="prestaciones" class="content-section">
    <div class="breadcrumb-area">
        <span class="breadcrumb">Panel de Control > Nómina > <strong>Cálculo de Prestaciones</strong></span>
    </div>

    <header class="section-header">
        <div class="header-info">
            <h1>Cálculo Técnico de Prestaciones</h1>
            <p>Determine el salario integral y las acumulaciones de ley para el personal universitario.</p>
        </div>
    </header>

    <div class="prestaciones-grid">
        <!-- Columna Principal -->
        <div class="calculation-main">
            <!-- Selector de Trabajador -->
            <div class="worker-selector-card">
                <div class="worker-avatar-box">
                    <i data-lucide="user"></i>
                </div>
                <div class="worker-details">
                    <h3>Dr. Ricardo J. Villasmil</h3>
                    <p>C.I. 12.456.789 • Profesor Titular • 28 años de servicio</p>
                    <div class="badge-row">
                        <span class="badge-status active-bg">ACTIVO</span>
                        <span class="badge-status info-bg">DEDICACIÓN EXCLUSIVA</span>
                    </div>
                </div>
                <button class="btn-ghost-blue">Cambiar Trabajador</button>
            </div>

            <!-- Estructura de Ingresos -->
            <div class="income-structure-card">
                <div class="card-title-row">
                    <div class="title-with-icon">
                        <i data-lucide="banknote"></i>
                        <h3>Estructura de Ingresos Mensuales</h3>
                    </div>
                    <span class="disclaimer">Valores expresados en divisas según tasa BCV</span>
                </div>

                <div class="inputs-grid-2x2">
                    <div class="calc-input-group">
                        <label>SUELDO BASE</label>
                        <div class="currency-input"><span>$</span><input type="text" value="1250.00"></div>
                    </div>
                    <div class="calc-input-group">
                        <label>PRIMA PROFESIONALIZACIÓN (20%)</label>
                        <div class="currency-input"><span>$</span><input type="text" value="250.00"></div>
                    </div>
                    <div class="calc-input-group">
                        <label>PRIMA POR HIJOS (CANT. 2)</label>
                        <div class="currency-input"><span>$</span><input type="text" value="85.50"></div>
                    </div>
                    <div class="calc-input-group">
                        <label>PRIMA DE ANTIGÜEDAD (FIJA)</label>
                        <div class="currency-input"><span>$</span><input type="text" value="312.00"></div>
                    </div>
                </div>

                <!-- Porcentaje Aplicable -->
                <div class="jubilation-percent-area">
                    <div class="percent-info">
                        <strong>Porcentaje de Jubilación Aplicable</strong>
                        <p>Según el artículo 42 de la Ley Orgánica de Universidades.</p>
                    </div>
                    <div class="percent-toggle">
                        <button class="active">100% <span>Jubilación</span></button>
                        <button>82.5% <span>Incapacidad</span></button>
                    </div>
                </div>
            </div>

            <!-- Salario Integral y Factor -->
            <div class="bottom-metrics">
                <div class="metric-box-white border-blue">
                    <div class="metric-icon-small blue-bg"><i data-lucide="calculator"></i></div>
                    <div class="metric-content">
                        <span class="tag-top">BASE MENSUAL</span>
                        <p>Salario Integral Estimado</p>
                        <h2>$ 1.897,50</h2>
                    </div>
                </div>
                <div class="metric-box-white border-green">
                    <div class="metric-icon-small green-bg"><i data-lucide="history"></i></div>
                    <div class="metric-content">
                        <span class="tag-top">VIGENCIA: 2024</span>
                        <p>Factor de Antigüedad (Años)</p>
                        <h2>28,4</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna Lateral (Sidebar de Totales) -->
        <aside class="calculation-sidebar">
            <div class="consolidated-card">
                <p class="card-label">RESUMEN CONSOLIDADO</p>
                <span class="total-subtitle">Total Prestaciones Acumuladas</span>
                <h1 class="total-amount">$ 53.889,00</h1>
                
                <div class="sub-amounts">
                    <div class="sub-item">
                        <span>Monto Mensual</span>
                        <strong>$ 1.897,50</strong>
                    </div>
                    <div class="sub-item">
                        <span>Ahorro Caja</span>
                        <strong>$ 4.560,12</strong>
                    </div>
                </div>

                <div class="liquidation-status">
                    <div class="status-header">
                        <span>Estado de Liquidación</span>
                        <span class="status-tag-green">PRE-APROBADO</span>
                    </div>
                    <div class="progress-bar-thin">
                        <div class="fill" style="width: 80%;"></div>
                    </div>
                </div>
            </div>

            <div class="action-buttons-stack">
                <button class="btn-dark-full"><i data-lucide="printer"></i> Generar Comprobante</button>
                <button class="btn-outline-full"><i data-lucide="refresh-cw"></i> Actualizar Historial</button>
                <p class="helper-text">Al procesar, se enviará una notificación al Departamento de Finanzas y al trabajador.</p>
            </div>

            <div class="doc-checklist-card">
                <h3>DOCUMENTOS REQUERIDOS</h3>
                <ul class="checklist">
                    <li class="done"><i data-lucide="check-circle-2"></i> Certificación de Cargos (Actualizado)</li>
                    <li class="done"><i data-lucide="check-circle-2"></i> Constancia de Años de Servicio</li>
                    <li class="pending"><i data-lucide="circle"></i> Acta de Cese de Funciones</li>
                </ul>
            </div>
        </aside>
    </div>
</div>

   <!-- SECCIÓN 6: REPORTES -->
<div id="reportes" class="content-section">
    <header class="section-header-flex">
        <div class="header-info">
            <h1>Centro de Reportes</h1>
            <p>Visualización y análisis de datos del sistema institucional</p>
        </div>
        <div class="header-actions">
            <button class="btn-outline-white"><i data-lucide="file-spreadsheet"></i> Exportar a Excel</button>
            <button class="btn-primary-dark"><i data-lucide="file-text"></i> Exportar a PDF</button>
        </div>
    </header>

    <!-- Barra de Filtros -->
    <div class="filters-bar-card">
        <div class="filter-group">
            <label>RANGO DE FECHAS</label>
            <div class="filter-input">
                <i data-lucide="calendar"></i>
                <span>01/01/2023 - 31/12/2023</span>
            </div>
        </div>
        <div class="filter-group">
            <label>ESTATUS DEL TRÁMITE</label>
            <select><option>Todos los estatus</option></select>
        </div>
        <div class="filter-group">
            <label>DEPARTAMENTO</label>
            <select><option>Todas las facultades</option></select>
        </div>
        <button class="btn-filter-apply"><i data-lucide="filter"></i> Aplicar Filtros</button>
    </div>

    <!-- Tarjetas de Métricas -->
    <div class="metrics-grid-3">
        <div class="metric-card-simple">
            <div class="metric-icon-box blue-light"><i data-lucide="clock"></i></div>
            <span class="metric-label">TIEMPO PROMEDIO</span>
            <div class="metric-value-row">
                <h2>42 <span>días</span></h2>
            </div>
            <span class="trend down"><i data-lucide="trending-down"></i> -5.2% respecto al mes anterior</span>
        </div>

        <div class="metric-card-simple">
            <div class="metric-icon-box green-light"><i data-lucide="check-square"></i></div>
            <span class="metric-label">TRÁMITES FINALIZADOS</span>
            <div class="metric-value-row">
                <h2>1,284</h2>
            </div>
            <span class="trend up"><i data-lucide="trending-up"></i> +12% en el último trimestre</span>
        </div>

        <div class="metric-card-wide">
            <div class="metric-content-left">
                <div class="metric-icon-box indigo-light"><i data-lucide="bar-chart-3"></i></div>
                <span class="metric-label">TOTAL PRESTACIONES PAGADAS</span>
                <div class="metric-value-row">
                    <h2>$84,295,000 <span class="currency-tag">MXN</span></h2>
                </div>
                <div class="legend-mini">
                    <span class="dot-indigo"></span> Docentes
                    <span class="dot-teal"></span> Administrativos
                </div>
            </div>
            <div class="metric-visual-right">
                <!-- Ilustración simplificada de edificio institucional -->
                <i data-lucide="landmark" class="bg-icon-watermark"></i>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="charts-grid-2">
        <div class="chart-card">
            <div class="chart-header">
                <h3>Trabajadores Jubilados por Año</h3>
                <div class="toggle-group">
                    <span>LINEAL</span>
                    <span class="active">BARRAS</span>
                </div>
            </div>
            <div class="chart-placeholder-bars">
                <!-- Representación visual de las barras -->
                <div class="bar-container"><div class="bar" style="height: 20%;"></div><span>2019</span></div>
                <div class="bar-container"><div class="bar" style="height: 35%;"></div><span>2020</span></div>
                <div class="bar-container"><div class="bar" style="height: 25%;"></div><span>2021</span></div>
                <div class="bar-container"><div class="bar" style="height: 45%;"></div><span>2022</span></div>
                <div class="bar-container active"><div class="bar" style="height: 80%;"></div><span>2023</span><small>284</small></div>
            </div>
        </div>

        <div class="chart-card">
            <h3>Solicitudes por Estatus Actual</h3>
            <div class="donut-chart-area">
                <div class="donut-visual">
                    <div class="inner-text">
                        <strong>452</strong>
                        <span>TOTAL ACTIVAS</span>
                    </div>
                </div>
                <ul class="chart-legend-list">
                    <li><span class="dot blue"></span> En Trámite <strong>60%</strong></li>
                    <li><span class="dot green"></span> Aprobadas <strong>25%</strong></li>
                    <li><span class="dot red"></span> Rechazadas <strong>15%</strong></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Tabla Resumen -->
    <div class="table-card-full">
        <div class="table-header">
            <h3>Resumen Estadístico por Departamento</h3>
            <a href="#" class="view-all">Ver desglose completo <i data-lucide="arrow-right"></i></a>
        </div>
        <table class="report-table">
            <thead>
                <tr>
                    <th>DEPARTAMENTO / FACULTAD</th>
                    <th>PLANTILLA ACTIVA</th>
                    <th>JUBILACIONES 2023</th>
                    <th>TIEMPO PROMEDIO</th>
                    <th>MONTO TOTAL ESTIMADO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="dept-cell">
                            <div class="dept-icon blue"><i data-lucide="microscope"></i></div>
                            <div><strong>Facultad de Ingeniería</strong><br><small>División de Ciencias Básicas</small></div>
                        </div>
                    </td>
                    <td>450</td>
                    <td><strong class="text-indigo">32</strong></td>
                    <td><span class="badge-time green">38 días</span></td>
                    <td>$12,450,000</td>
                </tr>
                <tr>
                    <td>
                        <div class="dept-cell">
                            <div class="dept-icon green"><i data-lucide="stethoscop"></i></div>
                            <div><strong>Facultad de Medicina</strong><br><small>Unidad de Especialidades</small></div>
                        </div>
                    </td>
                    <td>620</td>
                    <td><strong class="text-indigo">48</strong></td>
                    <td><span class="badge-time green">45 días</span></td>
                    <td>$18,220,000</td>
                </tr>
                <tr>
                    <td>
                        <div class="dept-cell">
                            <div class="dept-icon orange"><i data-lucide="gavel"></i></div>
                            <div><strong>Facultad de Derecho</strong><br><small>Ciencias Sociales</small></div>
                        </div>
                    </td>
                    <td>280</td>
                    <td><strong class="text-indigo">15</strong></td>
                    <td><span class="badge-time blue">52 días</span></td>
                    <td>$6,840,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

    <!-- BOTÓN LOGOUT SIEMPRE AL FINAL -->
    <form method="POST" action="{{ route('logout') }}" style="margin-top: 40px;">
        @csrf
        <button class="btn-logout" style="background: none; border: 1px solid #fa5252; color: #fa5252; padding: 8px 16px; border-radius: 6px; cursor: pointer;">
            <i data-lucide="log-out" size="16"></i> Cerrar sesión
        </button>
    </form>
</main>

<script>
    // Inicializar iconos
    lucide.createIcons();

    // Lógica de navegación entre secciones
    const menuItems = document.querySelectorAll('.menu-item');
    const sections = document.querySelectorAll('.content-section');

    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            const target = item.getAttribute('data-target');
            switchTab(target);
        });
    });

    function switchTab(id) {
        // Remover clases activas
        menuItems.forEach(i => i.classList.remove('active'));
        sections.forEach(s => s.classList.remove('active'));

        // Activar la seleccionada
        document.querySelector(`[data-target="${id}"]`).classList.add('active');
        document.getElementById(id).classList.add('active');

        // Refrescar iconos por si hay nuevos en la sección
        lucide.createIcons();
    }
</script>
</body>
</html>