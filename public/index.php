<?php
// Archivo de vista principal con los 10 componentes interactivos actualizados
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat-fé · Star-Light (Gestión Gastronómica)</title>
    <!-- Fuentes Google: Poppins (Títulos) e Inter (Cuerpo) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 CSS + Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Chart.js para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/catfe_styles.css">
</head>
<body>

<!-- 9. TOASTS / ALERTAS GLOBALES FLOTANTES -->
<div class="toast-container">
    <div id="catfeToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage">¡Acción completada!</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- 1. PANTALLA: LOGIN (DIVIDIDA / MINIMALISTA) -->
<!-- ========================================== -->
<div id="screen-login" class="min-vh-100 d-flex align-items-center justify-content-center p-3" style="background: #F4EFE6;">
    <div class="card card-catfe overflow-hidden w-100" style="max-width: 900px;">
        <div class="row g-0">
            <!-- Izquierda: Fotografía minimalista de café y branding -->
            <div class="col-md-6 d-none d-md-flex flex-column justify-content-between p-5 text-white" 
                 style="background: linear-gradient(135deg, rgba(46,35,0,0.88), rgba(192,88,5,0.85)), url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=800&q=80') center/cover;">
                <div>
                    <span class="badge badge-goldenrod px-3 py-2 rounded-pill mb-3">Star-Light Cafetería</span>
                    <h2 class="display-6 fw-bold">Cat-fé 🐾☕</h2>
                    <p class="text-light">Sistema inteligente de gestión de salón, pedidos, control de mermas y analítica de ventas.</p>
                </div>
                <div class="border-top border-secondary pt-3">
                    <small class="text-white-50">Tecnólogo en ADSO · SENA · Versión 2.0</small>
                </div>
            </div>

            <!-- Derecha: Formulario de acceso -->
            <div class="col-md-6 p-4 p-lg-5 d-flex flex-column justify-content-center bg-white">
                <div class="mb-4 text-center text-md-start">
                    <h3 class="fw-bold" style="color: var(--color-bark);">Iniciar Sesión</h3>
                    <p class="text-muted small">Ingresa tus credenciales para acceder como Administrador.</p>
                </div>

                <form id="formLogin" onsubmit="event.preventDefault(); handleLogin();" novalidate>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Usuario o Correo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                            <input type="email" id="loginEmail" class="form-control border-start-0" placeholder="admin@starlight-catfe.com" required value="admin@starlight-catfe.com">
                            <div class="invalid-feedback">Por favor ingresa un correo válido.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label small fw-semibold">Contraseña</label>
                            <a href="#" class="small text-decoration-none" style="color: var(--color-bronze);" onclick="showToast('Enlace de recuperación enviado al Administrador', 'info')">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock"></i></span>
                            <input type="password" id="loginPass" class="form-control border-start-0 border-end-0" placeholder="••••••••" required value="Catfe2026*">
                            <button type="button" class="input-group-text bg-light border-start-0" onclick="togglePass()"><i class="bi bi-eye" id="eyeIcon"></i></button>
                            <div class="invalid-feedback">La contraseña es obligatoria.</div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-catfe-primary w-100 py-2 mb-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Entrar al Sistema
                    </button>

                    <div class="position-relative text-center my-3">
                        <hr class="text-muted">
                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-2 small text-muted">o acceso rápido</span>
                    </div>

                    <!-- Botón de acceso con PIN (para cajeros en tablet) -->
                    <button type="button" class="btn btn-outline-secondary w-100 py-2" data-bs-toggle="modal" data-bs-target="#modalPinLogin">
                        <i class="bi bi-grid-3x3-gap-fill me-1" style="color: var(--color-bronze);"></i> Ingresar con Código PIN
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- APLICACIÓN PRINCIPAL (DESKTOP + TABLET + MOBILE) -->
<!-- ========================================== -->
<div id="app-wrapper" class="d-none">

    <!-- 10. NAVBAR SUPERIOR RESPONSIVE (TABLET & MOBILE) -->
    <nav class="navbar navbar-light bg-white border-bottom d-lg-none sticky-top px-3">
        <span class="navbar-brand fw-bold mb-0" style="color: var(--color-bark);">🐾 Cat-fé</span>
        <button class="btn btn-sm btn-outline-danger" onclick="logout()">
            <i class="bi bi-box-arrow-right"></i>
        </button>
    </nav>

    <!-- SIDEBAR COLAPSABLE CON HOVER EXPAND (DESKTOP) -->
    <aside class="catfe-sidebar" id="sidebarMenu">
        <div>
            <div class="d-flex align-items-center gap-3 mb-4 px-2">
                <span class="fs-4">🐾</span>
                <div class="brand-text">
                    <h5 class="mb-0 fw-bold brand-title text-white">Cat-fé</h5>
                    <small class="text-white-50" style="font-size: 0.72rem;">Star-Light Cafetería</small>
                </div>
            </div>

            <nav class="nav flex-column">
                <a class="nav-link active" onclick="switchSection('dashboard', this)">
                    <i class="bi bi-speedometer2"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a class="nav-link" onclick="switchSection('mesas', this)">
                    <i class="bi bi-grid-3x3"></i>
                    <span class="nav-text">Plano de Mesas</span>
                </a>
                <a class="nav-link" onclick="switchSection('inventario', this)">
                    <i class="bi bi-box-seam"></i>
                    <span class="nav-text">Estante Inventario</span>
                </a>
                <a class="nav-link" onclick="switchSection('menu', this)">
                    <i class="bi bi-cup-hot"></i>
                    <span class="nav-text">Menú Digital</span>
                </a>
                <a class="nav-link" onclick="switchSection('listados', this)">
                    <i class="bi bi-table"></i>
                    <span class="nav-text">Órdenes / Pedidos</span>
                </a>
                <a class="nav-link" onclick="switchSection('formularios', this)">
                    <i class="bi bi-pencil-square"></i>
                    <span class="nav-text">Nuevo Producto</span>
                </a>
                <a class="nav-link" onclick="switchSection('detalle', this)">
                    <i class="bi bi-receipt"></i>
                    <span class="nav-text">Detalle de Pedido</span>
                </a>
                <a class="nav-link" onclick="switchSection('reportes', this)">
                    <i class="bi bi-bar-chart-line"></i>
                    <span class="nav-text">Reportes & Mermas</span>
                </a>
            </nav>
        </div>

        <div class="border-top border-secondary pt-3">
            <div class="d-flex align-items-center gap-2 mb-2 px-1">
                <div class="rounded-circle bg-warning text-dark fw-bold d-flex align-items-center justify-content-center" style="min-width: 36px; height: 36px;">BC</div>
                <div class="user-info-text overflow-hidden">
                    <div class="small fw-bold text-truncate text-white">Brayan Cuta</div>
                    <div class="text-white-50" style="font-size: 0.7rem;">Administrador</div>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-light w-100" onclick="logout()">
                <i class="bi bi-box-arrow-left"></i>
                <span class="nav-text ms-1">Cerrar Sesión</span>
            </button>
        </div>
    </aside>

    <!-- BOTTOM NAVIGATION BAR EN TELÉFONO CON CÍRCULO CLARO -->
    <div class="bottom-nav-mobile">
        <div class="bottom-nav-item active" onclick="switchSection('dashboard'); selectMobileItem(this);">
            <div class="icon-wrapper"><i class="bi bi-speedometer2"></i></div>
            <span>Inicio</span>
        </div>
        <div class="bottom-nav-item" onclick="switchSection('mesas'); selectMobileItem(this);">
            <div class="icon-wrapper"><i class="bi bi-grid-3x3"></i></div>
            <span>Mesas</span>
        </div>
        <div class="bottom-nav-item" onclick="switchSection('inventario'); selectMobileItem(this);">
            <div class="icon-wrapper"><i class="bi bi-box-seam"></i></div>
            <span>Stock</span>
        </div>
        <div class="bottom-nav-item" onclick="switchSection('menu'); selectMobileItem(this);">
            <div class="icon-wrapper"><i class="bi bi-cup-hot"></i></div>
            <span>Menú</span>
        </div>
        <div class="bottom-nav-item" onclick="switchSection('reportes'); selectMobileItem(this);">
            <div class="icon-wrapper"><i class="bi bi-bar-chart-line"></i></div>
            <span>Reportes</span>
        </div>
    </div>

    <!-- CONTENEDOR PRINCIPAL DINÁMICO -->
    <main class="main-content">

        <!-- ========================================== -->
        <!-- 2. PANTALLA: DASHBOARD (PANEL PRINCIPAL)   -->
        <!-- ========================================== -->
        <section id="section-dashboard" class="content-section">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Panel del Administrador</h2>
                    <p class="text-muted mb-0 small">Métricas operativas y actividad en tiempo real de Star-Light.</p>
                </div>
                <button class="btn btn-catfe-accent btn-sm" onclick="switchSection('mesas')">
                    <i class="bi bi-grid-3x3 me-1"></i> Ver Salón de Mesas
                </button>
            </div>

            <!-- TARJETAS DE MÉTRICAS RÁPIDAS (KPIs) -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-catfe p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-semibold">Ventas del Día</span>
                                <h3 class="fw-bold mt-1 mb-0" style="color: var(--color-seaweed);">$485.000</h3>
                                <small class="text-success"><i class="bi bi-arrow-up-right"></i> +14% vs ayer</small>
                            </div>
                            <div class="p-3 rounded-circle bg-light text-success fs-3"><i class="bi bi-cash-stack"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-catfe p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-semibold">Pedidos Pendientes</span>
                                <h3 class="fw-bold mt-1 mb-0" style="color: var(--color-bronze);">4 en Barra</h3>
                                <small class="text-warning"><i class="bi bi-clock-history"></i> Tiempo prom: 6 min</small>
                            </div>
                            <div class="p-3 rounded-circle bg-light text-warning fs-3"><i class="bi bi-hourglass-split"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-catfe p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-semibold">Top Vendidos</span>
                                <h4 class="fw-bold mt-1 mb-0 text-truncate" style="color: var(--color-bark); max-width: 150px;">Capuchino Cat-fé</h4>
                                <small class="text-muted">38 unidades vendidas</small>
                            </div>
                            <div class="p-3 rounded-circle bg-light text-primary fs-3"><i class="bi bi-star-fill" style="color: var(--color-goldenrod);"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-catfe p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small fw-semibold">Ticket Promedio</span>
                                <h3 class="fw-bold mt-1 mb-0" style="color: var(--color-bark);">$24.250</h3>
                                <small class="text-muted">Consumo por mesa</small>
                            </div>
                            <div class="p-3 rounded-circle bg-light text-info fs-3"><i class="bi bi-receipt-cutoff"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- GRÁFICO DE RENDIMIENTO + ACTIVIDAD RECIENTE -->
            <div class="row g-4">
                <div class="col-12 col-lg-7">
                    <div class="card card-catfe p-4 h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0" style="color: var(--color-bark);">Ventas por Hora (Previsión de Horas Pico)</h5>
                            <span class="badge badge-seaweed">Hoy</span>
                        </div>
                        <div style="height: 280px;">
                            <canvas id="chartVentasHora"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="card card-catfe p-4 h-100">
                        <h5 class="fw-bold mb-3" style="color: var(--color-bark);">Actividad Reciente (En Barra)</h5>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <div class="fw-semibold">Pedido #108 · Mesa 3</div>
                                    <small class="text-muted">2x Capuchino, 1x Cheesecake</small>
                                </div>
                                <span class="badge bg-warning text-dark rounded-pill">En preparación</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <div class="fw-semibold">Pedido #107 · Mesa 1</div>
                                    <small class="text-muted">1x Latte Vainilla (Leche almendra)</small>
                                </div>
                                <span class="badge bg-success rounded-pill">Listo</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <div class="fw-semibold">Pedido #106 · Mesa 5</div>
                                    <small class="text-muted">1x Espresso Doble, 1x Croissant</small>
                                </div>
                                <span class="badge bg-secondary rounded-pill">Entregado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- PLANO DE MESAS CON SEPARACIÓN ARQUITECTÓNICA -->
        <!-- ========================================== -->
        <section id="section-mesas" class="content-section d-none">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Distribución y Separación de Mesas</h2>
                    <p class="text-muted mb-0 small">Mapa del salón de Star-Light distribuido por zonas de servicio.</p>
                </div>
                <div class="d-flex gap-2">
                    <span class="badge bg-success px-3 py-2"><i class="bi bi-circle-fill me-1"></i> Disponible</span>
                    <span class="badge bg-warning text-dark px-3 py-2"><i class="bi bi-circle-fill me-1"></i> Ocupada</span>
                    <span class="badge bg-danger px-3 py-2"><i class="bi bi-circle-fill me-1"></i> Por Cobrar</span>
                </div>
            </div>

            <div class="floorplan-container">
                <!-- Zona Superior: Cabinas Verdes Privadas (Booths) -->
                <div class="floorplan-zone">
                    <div class="zone-title"><i class="bi bi-shield-shaded"></i> Zona Cabinas Privadas / Booths Superiores</div>
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="table-seat-unit table-booth" onclick="gestionarMesa(1, 'Cabina Privada 1', 'DISPONIBLE')">
                                <div class="fw-bold text-success">Mesa B-01</div>
                                <div class="small text-muted">👥 4 Puestos · Disponible</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="table-seat-unit table-booth" onclick="gestionarMesa(2, 'Cabina Privada 2', 'OCUPADA')">
                                <div class="fw-bold text-warning">Mesa B-02</div>
                                <div class="small text-muted">👥 4 Puestos · Ocupada</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="table-seat-unit table-booth" onclick="gestionarMesa(3, 'Cabina Privada 3', 'DISPONIBLE')">
                                <div class="fw-bold text-success">Mesa B-03</div>
                                <div class="small text-muted">👥 4 Puestos · Disponible</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="table-seat-unit table-booth" onclick="gestionarMesa(4, 'Cabina Privada 4', 'POR_COBRAR')">
                                <div class="fw-bold text-danger">Mesa B-04</div>
                                <div class="small text-muted">👥 4 Puestos · Por Cobrar</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Zona Media: Salón Central (Mesas Redondas Azules) + Salones Lounge Rosados -->
                <div class="row g-3">
                    <!-- Lounge Izquierdo (Mesas Rosadas) -->
                    <div class="col-12 col-md-4">
                        <div class="floorplan-zone h-100">
                            <div class="zone-title"><i class="bi bi-cup"></i> Salón Lounge Familiar</div>
                            <div class="d-flex flex-column gap-3">
                                <div class="table-seat-unit table-lounge" onclick="gestionarMesa(5, 'Lounge Familiar L-01', 'OCUPADA')">
                                    <div class="fw-bold text-warning">Lounge L-01</div>
                                    <div class="small text-muted">👥 6 Puestos · Consumo activo</div>
                                </div>
                                <div class="table-seat-unit table-lounge" onclick="gestionarMesa(6, 'Lounge Familiar L-02', 'DISPONIBLE')">
                                    <div class="fw-bold text-success">Lounge L-02</div>
                                    <div class="small text-muted">👥 6 Puestos · Disponible</div>
                                </div>
                                <div class="table-seat-unit table-lounge" onclick="gestionarMesa(7, 'Lounge Familiar L-03', 'DISPONIBLE')">
                                    <div class="fw-bold text-success">Lounge L-03</div>
                                    <div class="small text-muted">👥 6 Puestos · Disponible</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Salón Central (Mesas Azules en 2 Pasillos) -->
                    <div class="col-12 col-md-8">
                        <div class="floorplan-zone h-100">
                            <div class="zone-title"><i class="bi bi-diagram-3"></i> Salón Central (Pasillo Principal)</div>
                            <div class="row g-3">
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(8, 'Mesa Central C-01', 'DISPONIBLE')">
                                        <div class="fw-bold text-success">Mesa C-01</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(9, 'Mesa Central C-02', 'OCUPADA')">
                                        <div class="fw-bold text-warning">Mesa C-02</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(10, 'Mesa Central C-03', 'DISPONIBLE')">
                                        <div class="fw-bold text-success">Mesa C-03</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(11, 'Mesa Central C-04', 'DISPONIBLE')">
                                        <div class="fw-bold text-success">Mesa C-04</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(12, 'Mesa Central C-05', 'OCUPADA')">
                                        <div class="fw-bold text-warning">Mesa C-05</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(13, 'Mesa Central C-06', 'DISPONIBLE')">
                                        <div class="fw-bold text-success">Mesa C-06</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(14, 'Mesa Central C-07', 'DISPONIBLE')">
                                        <div class="fw-bold text-success">Mesa C-07</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="table-seat-unit table-central" onclick="gestionarMesa(15, 'Mesa Central C-08', 'POR_COBRAR')">
                                        <div class="fw-bold text-danger">Mesa C-08</div>
                                        <div class="small text-muted">👥 4 Puestos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Zona Inferior: Barra Semicircular y Cocina (Kitchen) -->
                <div class="floorplan-zone mt-3">
                    <div class="row align-items-center g-3">
                        <div class="col-md-7">
                            <div class="zone-title"><i class="bi bi-cup-straw"></i> Barra Semicircular de Café & Coctelería</div>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-warning text-dark p-2">Barra Banqueta 1</span>
                                <span class="badge bg-success p-2">Barra Banqueta 2</span>
                                <span class="badge bg-warning text-dark p-2">Barra Banqueta 3</span>
                                <span class="badge bg-success p-2">Barra Banqueta 4</span>
                                <span class="badge bg-success p-2">Barra Banqueta 5</span>
                                <span class="badge bg-success p-2">Barra Banqueta 6</span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="p-3 bg-secondary text-white rounded-3 text-center">
                                <div class="fw-bold">ÁREA DE COCINA (KITCHEN) & BARRA KDS</div>
                                <small class="text-white-50">Despacho de pedidos y control de mermas</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- ESTANTE MODULAR DE CAJAS (INVENTARIO VISUAL)-->
        <!-- ========================================== -->
        <section id="section-inventario" class="content-section d-none">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Estante de Inventario (Almacén Star-Light)</h2>
                    <p class="text-muted mb-0 small">Visualización en estantería modular de cajas con stock físico y alertas.</p>
                </div>
                <button class="btn btn-catfe-primary btn-sm" onclick="switchSection('formularios')">
                    <i class="bi bi-plus-lg me-1"></i> Añadir Nueva Caja / Producto
                </button>
            </div>

            <div class="warehouse-rack">
                <!-- Nivel 1 (Superior): Insumos de Alta Rotación -->
                <div class="rack-shelf">
                    <div class="d-flex justify-content-between text-white-50 small mb-2 border-bottom border-secondary pb-1">
                        <span>ESTANTE NIVEL 1 · CAFÉ EN GRANO & POLVOS</span>
                        <span>Capacidad: 100%</span>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="rack-box-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0">Café Grano Especial Huila (10 kg)</h6>
                                    <span class="badge bg-dark text-warning">Stock: 35 kg</span>
                                </div>
                                <div class="small">Lote: HU-2026-B · Caducidad: 30 Dic 2026</div>
                                <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top border-dark">
                                    <span class="fw-bold">$2.800 / porción</span>
                                    <button class="btn btn-sm btn-dark text-warning py-0" onclick="showToast('Ajustando stock de Café', 'info')">Ajustar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="rack-box-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0">Té Matcha Japonés en Polvo (5 kg)</h6>
                                    <span class="badge bg-dark text-warning">Stock: 20 kg</span>
                                </div>
                                <div class="small">Lote: MAT-09 · Caducidad: 25 Nov 2026</div>
                                <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top border-dark">
                                    <span class="fw-bold">$3.800 / dosis</span>
                                    <button class="btn btn-sm btn-dark text-warning py-0" onclick="showToast('Ajustando stock de Matcha', 'info')">Ajustar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nivel 2 (Medio): Caja Grande Central (Insumos Perecederos) -->
                <div class="rack-shelf">
                    <div class="d-flex justify-content-between text-white-50 small mb-2 border-bottom border-secondary pb-1">
                        <span>ESTANTE NIVEL 2 · CAJA MAESTRA DE REPOSTERÍA DEL DÍA</span>
                        <span>Caducidad Corta (< 48h)</span>
                    </div>
                    <div class="rack-box-card" style="background: #DE9B28;">
                        <div class="row align-items-center g-3">
                            <div class="col-md-8">
                                <h5 class="fw-bold mb-1">Caja Maestra: Repostería y Cheesecakes Frescos</h5>
                                <p class="small mb-1">Contiene porciones horneadas con vida útil estricta de 72 horas para prevenir mermas.</p>
                                <div class="badge bg-danger me-1">12 Cheesecakes</div>
                                <div class="badge bg-danger me-1">9 Tortas de Chocolate</div>
                                <div class="badge bg-dark">0 Croissants (Agotado)</div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="fw-bold fs-5 text-dark">$12.000 COP / Pza</div>
                                <button class="btn btn-sm btn-dark text-white mt-2" onclick="showToast('Alerta de caducidad revisada', 'success')">
                                    <i class="bi bi-shield-check"></i> Auditar Lote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nivel 3 (Inferior): Dos Cajas Medianas (Leches y Desechables) -->
                <div class="rack-shelf mb-0">
                    <div class="d-flex justify-content-between text-white-50 small mb-2 border-bottom border-secondary pb-1">
                        <span>ESTANTE NIVEL 3 · LÁCTEOS Y BEBIDAS VEGETALES</span>
                        <span>Refrigeración</span>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="rack-box-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0">Leche de Almendras Orgánica (Caja 12L)</h6>
                                    <span class="badge bg-danger">Alerta: 6L</span>
                                </div>
                                <div class="small text-danger fw-semibold">¡Próxima a vencer en 48 horas!</div>
                                <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top border-dark">
                                    <span class="fw-bold">$12.000 / Litro</span>
                                    <button class="btn btn-sm btn-danger text-white py-0" onclick="switchSection('reportes')">Ver Merma</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="rack-box-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0">Vasos Biodegradables 12oz (Caja 500u)</h6>
                                    <span class="badge bg-dark text-warning">Stock: 450 u</span>
                                </div>
                                <div class="small">Lote desechable ecológico de takeaway</div>
                                <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top border-dark">
                                    <span class="fw-bold">$350 / unidad</span>
                                    <button class="btn btn-sm btn-dark text-warning py-0" onclick="showToast('Insumos al día', 'info')">Revisar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- 3. PANTALLA: MENÚ (GESTIÓN E INTERFAZ)     -->
        <!-- ========================================== -->
        <section id="section-menu" class="content-section d-none">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Menú Digital</h2>
                    <p class="text-muted mb-0 small">Catálogo interactivo con alérgenos y disponibilidad en tiempo real.</p>
                </div>
                <div class="position-relative" style="min-width: 280px;">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" id="searchMenuInput" class="form-control border-start-0" placeholder="Buscar café, postre..." onkeyup="filterMenuCards()">
                    </div>
                </div>
            </div>

            <!-- Pestañas Deslizables por Categoría -->
            <ul class="nav nav-pills mb-4 gap-2 flex-nowrap overflow-auto pb-2" id="pillsCategory">
                <li class="nav-item"><button class="nav-link active rounded-pill btn-catfe-primary" onclick="filterCategory('todos', this)">Todos</button></li>
                <li class="nav-item"><button class="nav-link rounded-pill btn-outline-secondary" onclick="filterCategory('cafes', this)">Cafés de Especialidad</button></li>
                <li class="nav-item"><button class="nav-link rounded-pill btn-outline-secondary" onclick="filterCategory('frias', this)">Bebidas Frías</button></li>
                <li class="nav-item"><button class="nav-link rounded-pill btn-outline-secondary" onclick="filterCategory('reposteria', this)">Repostería</button></li>
                <li class="nav-item"><button class="nav-link rounded-pill btn-outline-secondary" onclick="filterCategory('desayunos', this)">Desayunos & Snacks</button></li>
            </ul>

            <!-- TARJETAS DE PRODUCTO (CARDS) -->
            <div class="row g-4" id="cardsContainer">
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 product-item" data-category="cafes" data-name="capuchino especial catfe">
                    <div class="card card-catfe h-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1534778101976-62847782c213?auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Capuchino">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="fw-bold mb-0">Capuchino Especial</h6>
                                    <span class="text-success fw-bold">$8.500</span>
                                </div>
                                <span class="badge bg-light text-dark border me-1"><i class="bi bi-egg-fried"></i> Lácteos</span>
                                <span class="badge badge-goldenrod">Top Vendidos</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" checked id="switch1" onchange="showToast('Disponibilidad actualizada', 'success')">
                                    <label class="form-check-label small" for="switch1">Disponible</label>
                                </div>
                                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalPersonalizar" onclick="abrirModalPersonalizar('Capuchino Especial', 8500)">
                                    <i class="bi bi-sliders"></i> Personalizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 product-item" data-category="reposteria" data-name="cheesecake de arandanos">
                    <div class="card card-catfe h-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1533134242443-d4fd215305ad?auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Cheesecake">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="fw-bold mb-0">Cheesecake Arándanos</h6>
                                    <span class="text-success fw-bold">$12.000</span>
                                </div>
                                <span class="badge bg-light text-dark border me-1">Gluten</span>
                                <span class="badge badge-goldenrod">Top Vendidos</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" checked id="switch2">
                                    <label class="form-check-label small" for="switch2">Disponible</label>
                                </div>
                                <button class="btn btn-sm btn-outline-dark" onclick="showToast('Añadido a orden de mesa', 'success')">
                                    <i class="bi bi-plus"></i> Ordenar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 product-item" data-category="frias" data-name="matcha frappe felino">
                    <div class="card card-catfe h-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1536256263959-770b48d82b0a?auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Matcha">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="fw-bold mb-0">Matcha Frappé Felino</h6>
                                    <span class="text-success fw-bold">$10.500</span>
                                </div>
                                <span class="badge bg-light text-dark border">Vegano</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" checked id="switch3">
                                    <label class="form-check-label small" for="switch3">Disponible</label>
                                </div>
                                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalPersonalizar" onclick="abrirModalPersonalizar('Matcha Frappé Felino', 10500)">
                                    <i class="bi bi-sliders"></i> Personalizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 product-item" data-category="desayunos" data-name="croissant frances de almendras">
                    <div class="card card-catfe h-100 overflow-hidden opacity-75">
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 160px; object-fit: cover; filter: grayscale(80%);" alt="Croissant">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="fw-bold mb-0">Croissant Almendras</h6>
                                    <span class="text-muted fw-bold">$7.500</span>
                                </div>
                                <span class="badge bg-danger">Agotado (Stock 0)</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="switch4">
                                    <label class="form-check-label small" for="switch4">Inactivo</label>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary" disabled>No disponible</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- 4. PANTALLA: LISTADOS (TABLAS DE DATOS)    -->
        <!-- ========================================== -->
        <section id="section-listados" class="content-section d-none">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Administración de Pedidos</h2>
                    <p class="text-muted mb-0 small">Tabla de datos con ordenamiento, acciones en lote y paginación fija.</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-danger btn-sm" onclick="showModalEliminar()">
                        <i class="bi bi-trash me-1"></i> Eliminar Selección
                    </button>
                    <button class="btn btn-catfe-primary btn-sm" onclick="showToast('Exportando reporte a Excel...', 'success')">
                        <i class="bi bi-file-earmark-excel me-1"></i> Exportar
                    </button>
                </div>
            </div>

            <div class="card card-catfe p-0 overflow-hidden mb-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;"><input type="checkbox" class="form-check-input" id="checkAll" onclick="toggleAllChecks(this)"></th>
                                <th>ID</th>
                                <th>Cliente / Mesa</th>
                                <th>Fecha & Hora</th>
                                <th>Total ($)</th>
                                <th>Estado</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="pedidosTableBody">
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-check"></td>
                                <td class="fw-bold">#108</td>
                                <td>Mesa 3 (Carlos Rojas)</td>
                                <td>Hoy 14:30</td>
                                <td class="fw-bold">$29.000</td>
                                <td><span class="badge bg-warning text-dark">En cocina</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" onclick="verDetallePedido(108)"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarFila(this)"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-check"></td>
                                <td class="fw-bold">#107</td>
                                <td>Mesa 1 (Laura Gómez)</td>
                                <td>Hoy 14:15</td>
                                <td class="fw-bold">$17.500</td>
                                <td><span class="badge bg-success">Listo</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" onclick="verDetallePedido(107)"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarFila(this)"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center p-3 border-top bg-light gap-2">
                    <div class="small text-muted">Mostrando 2 de 48 registros</div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                            <li class="page-item active"><a class="page-link btn-catfe-primary text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">»</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- 5. PANTALLA: FORMULARIOS (CREACIÓN / EDICIÓN) -->
        <!-- ========================================== -->
        <section id="section-formularios" class="content-section d-none">
            <div class="mb-4">
                <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Registro de Nuevo Producto / Insumo</h2>
                <p class="text-muted mb-0 small">Estructura en dos columnas con validaciones activas y selectores dinámicos.</p>
            </div>

            <div class="card card-catfe p-4 p-md-5">
                <form id="formProducto" onsubmit="event.preventDefault(); guardarProducto();" novalidate>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Nombre del Producto <span class="text-danger">*</span></label>
                                <input type="text" id="prodNombre" class="form-control" placeholder="Ej: Latte Avellana Star-Light" required>
                                <div class="invalid-feedback">El nombre es obligatorio y debe tener al menos 3 caracteres.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Categoría <span class="text-danger">*</span></label>
                                <select id="prodCategoria" class="form-select" required>
                                    <option value="" selected disabled>Selecciona una categoría...</option>
                                    <option value="1">Cafés de Especialidad</option>
                                    <option value="2">Bebidas Frías</option>
                                    <option value="3">Repostería Artesanal</option>
                                    <option value="4">Desayunos & Snacks</option>
                                </select>
                                <div class="invalid-feedback">Debes elegir una categoría.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Precio de Venta ($ COP) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" onclick="ajustarValor('prodPrecio', -500)">-</button>
                                    <input type="number" id="prodPrecio" class="form-control text-center" value="9500" min="0" step="100" required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="ajustarValor('prodPrecio', 500)">+</button>
                                    <div class="invalid-feedback">El precio no puede ser negativo o estar vacío.</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Stock Inicial (Existencias) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" onclick="ajustarValor('prodStock', -1)">-</button>
                                    <input type="number" id="prodStock" class="form-control text-center" value="20" min="0" required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="ajustarValor('prodStock', 1)">+</button>
                                    <div class="invalid-feedback">El stock debe ser 0 o superior.</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label fw-semibold small">Descripción Gastronómica</label>
                                    <span class="small text-muted" id="charCount">0 / 150</span>
                                </div>
                                <textarea id="prodDesc" class="form-control" rows="4" maxlength="150" placeholder="Notas de sabor, origen del grano, sugerencia de maridaje..." oninput="updateCharCount(this)"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <button type="reset" class="btn btn-outline-secondary px-4">Limpiar</button>
                        <button type="submit" class="btn btn-catfe-primary px-4">Guardar Producto en Carta</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- 6. PANTALLA: VISTA DE DETALLE (FICHA PEDIDO) -->
        <!-- ========================================== -->
        <section id="section-detalle" class="content-section d-none">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Detalle del Pedido #108</h2>
                    <p class="text-muted mb-0 small">Ficha minuciosa de comanda con desglose y trazabilidad de preparación.</p>
                </div>
                <button class="btn btn-outline-secondary btn-sm" onclick="switchSection('listados')">
                    <i class="bi bi-arrow-left me-1"></i> Volver a Listados
                </button>
            </div>

            <div class="row g-4">
                <div class="col-12 col-lg-5">
                    <div class="card card-catfe p-4 h-100">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Información de Mesa</h5>
                        <div class="mb-2"><strong>Mesa Asignada:</strong> <span class="badge badge-bronze">Mesa #3 (Capacidad 4)</span></div>
                        <div class="mb-2"><strong>Mesero Responsable:</strong> Carlos Andrés Rojas</div>
                        <div class="mb-3"><strong>Hora de Toma:</strong> 14:30:15 (Hace 8 minutos)</div>

                        <div class="alert alert-warning border-0 small mb-4">
                            <strong><i class="bi bi-info-circle"></i> Notas de Barra / Cocina:</strong><br>
                            • 1 Capuchino con leche de almendra y canela espolvoreada.<br>
                            • El cheesecake se sirve al centro para compartir.
                        </div>

                        <h6 class="fw-bold mb-3">Trayecto del Pedido (Timeline):</h6>
                        <ul class="timeline">
                            <li class="timeline-item">
                                <div class="timeline-badge completed"><i class="bi bi-check"></i></div>
                                <div class="fw-bold small">Recibido ☕</div>
                                <div class="text-muted" style="font-size: 0.75rem;">14:30 · Comanda digital enviada</div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge completed"><i class="bi bi-clock"></i></div>
                                <div class="fw-bold small">En Cocina / Barra 🍪</div>
                                <div class="text-muted" style="font-size: 0.75rem;">14:32 · Barista en extracción</div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge"><i class="bi bi-bell"></i></div>
                                <div class="fw-bold small text-muted">Listo para Entrega ✔️</div>
                                <div class="text-muted" style="font-size: 0.75rem;">Pendiente de campanazo</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-7">
                    <div class="card card-catfe p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold mb-3 border-bottom pb-2">Desglose de Consumos</h5>
                            <table class="table mb-4">
                                <thead class="small text-muted">
                                    <tr>
                                        <th>Cant.</th>
                                        <th>Producto</th>
                                        <th class="text-end">P. Unit</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2x</td>
                                        <td>Capuchino Especial Cat-fé</td>
                                        <td class="text-end">$8.500</td>
                                        <td class="text-end fw-semibold">$17.000</td>
                                    </tr>
                                    <tr>
                                        <td>1x</td>
                                        <td>Cheesecake de Arándanos Silvestres</td>
                                        <td class="text-end">$12.000</td>
                                        <td class="text-end fw-semibold">$12.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="bg-light p-3 rounded-3 border">
                            <div class="d-flex justify-content-between small text-muted mb-1">
                                <span>Subtotal:</span>
                                <span>$26.852 COP</span>
                            </div>
                            <div class="d-flex justify-content-between small text-muted mb-2">
                                <span>Impoconsumo (8%):</span>
                                <span>$2.148 COP</span>
                            </div>
                            <div class="d-flex justify-content-between fw-bold fs-5 pt-2 border-top" style="color: var(--color-bark);">
                                <span>TOTAL A LIQUIDAR:</span>
                                <span style="color: var(--color-bronze);">$29.000 COP</span>
                            </div>
                            <div class="mt-3 d-flex gap-2">
                                <button class="btn btn-catfe-primary flex-grow-1" onclick="showToast('Factura generada y mesa liberada', 'success')">
                                    <i class="bi bi-check2-circle"></i> Procesar Cobro (Efectivo/Datáfono)
                                </button>
                                <button class="btn btn-outline-secondary" onclick="window.print()">
                                    <i class="bi bi-printer"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- 8. PANTALLA: REPORTES (ANÁLISIS DE DATOS)  -->
        <!-- ========================================== -->
        <section id="section-reportes" class="content-section d-none">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Módulo de Reportes & Analítica</h2>
                    <p class="text-muted mb-0 small">Análisis de productos estrella (*Top Vendidos*) y control financiero de mermas.</p>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <select class="form-select form-select-sm" style="width: 140px;">
                        <option>Hoy</option>
                        <option>Esta semana</option>
                        <option selected>Mes actual</option>
                        <option>Personalizado</option>
                    </select>
                    <button class="btn btn-sm btn-outline-danger" onclick="showToast('Generando reporte PDF formal...', 'success')">
                        <i class="bi bi-file-earmark-pdf"></i> PDF
                    </button>
                    <button class="btn btn-sm btn-outline-success" onclick="showToast('Descargando archivo Excel...', 'success')">
                        <i class="bi bi-file-earmark-spreadsheet"></i> Excel
                    </button>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-12 col-md-6">
                    <div class="card card-catfe p-4 h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0" style="color: var(--color-bark);">Desglose de Pérdidas por Merma</h5>
                            <span class="badge bg-danger">RN-03 Costeo Activo</span>
                        </div>
                        <div class="alert alert-danger border-0 p-3 mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-uppercase fw-bold text-danger">Total Perdido este Mes</small>
                                <h3 class="fw-bold mb-0 text-danger">$47.600 COP</h3>
                            </div>
                            <i class="bi bi-trash3 fs-1 text-danger opacity-50"></i>
                        </div>
                        <ul class="list-group list-group-flush small">
                            <li class="list-group-item d-flex justify-content-between px-0">
                                <span>Caducidad (Leche de almendra y croissants)</span>
                                <strong class="text-danger">-$33.000 COP (69%)</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between px-0">
                                <span>Error de preparación (Leche sobrecalentada)</span>
                                <strong class="text-danger">-$9.400 COP (20%)</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between px-0">
                                <span>Accidentes / Deterioro en barra</span>
                                <strong class="text-danger">-$5.200 COP (11%)</strong>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card card-catfe p-4 h-100">
                        <h5 class="fw-bold mb-3" style="color: var(--color-bark);">Ranking de Top Vendidos</h5>
                        <div class="table-responsive">
                            <table class="table table-sm align-middle">
                                <thead class="small text-muted">
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th class="text-center">Uds</th>
                                        <th class="text-end">Total Recaudado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="badge badge-goldenrod">1</span></td>
                                        <td><strong>Capuchino Cat-fé</strong></td>
                                        <td class="text-center">142</td>
                                        <td class="text-end fw-semibold">$1.207.000</td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-secondary">2</span></td>
                                        <td>Cheesecake Arándanos</td>
                                        <td class="text-center">88</td>
                                        <td class="text-end fw-semibold">$1.056.000</td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-secondary">3</span></td>
                                        <td>Latte Vainilla Star-Light</td>
                                        <td class="text-center">76</td>
                                        <td class="text-end fw-semibold">$684.000</td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-secondary">4</span></td>
                                        <td>Matcha Frappé Felino</td>
                                        <td class="text-center">54</td>
                                        <td class="text-end fw-semibold">$567.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<!-- ========================================== -->
<!-- 7. VENTANAS EMERGENTES (MODALES)          -->
<!-- ========================================== -->
<div class="modal fade" id="modalConfirmarEliminar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-catfe">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-danger"><i class="bi bi-exclamation-triangle-fill me-1"></i> Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
                <p class="text-muted mb-0">¿Estás seguro de que deseas eliminar este elemento? Esta acción afectará el historial de la cafetería.</p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="ejecutarEliminacion()">Sí, Eliminar Definitivamente</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPersonalizar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-catfe">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title fw-bold" id="modalItemTitle">Personalizar Bebida</h5>
                    <small class="text-muted" id="modalItemBasePrice">$8.500 COP Base</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label small fw-bold">Tipo de Leche:</label>
                    <select class="form-select form-select-sm">
                        <option>Entera Tradicional</option>
                        <option>Deslactosada</option>
                        <option>Almendra (+ $2.000)</option>
                        <option>Avena (+ $2.000)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Nivel de Endulzante:</label>
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" name="azucar" id="az1" checked>
                        <label class="btn btn-outline-secondary btn-sm" for="az1">Normal</label>
                        <input type="radio" class="btn-check" name="azucar" id="az2">
                        <label class="btn btn-outline-secondary btn-sm" for="az2">Bajo</label>
                        <input type="radio" class="btn-check" name="azucar" id="az3">
                        <label class="btn btn-outline-secondary btn-sm" for="az3">Sin Azúcar</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Adiciones & Extras:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="extra1">
                        <label class="form-check-label small" for="extra1">Extra Shot Espresso (+ $1.500)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="extra2">
                        <label class="form-check-label small" for="extra2">Jarabe de Vainilla Francesa (+ $1.200)</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-catfe-primary" onclick="guardarPersonalizacion()">Agregar a la Mesa</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPinLogin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content card-catfe text-center p-4">
            <h5 class="fw-bold mb-1">Código PIN</h5>
            <small class="text-muted mb-3">Modo Tablet / Punto de Venta</small>
            <input type="password" maxlength="4" class="form-control form-control-lg text-center fs-2 tracking-widest my-3" placeholder="••••" id="pinInput">
            <div class="row g-2 mb-3">
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('1')">1</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('2')">2</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('3')">3</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('4')">4</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('5')">5</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('6')">6</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('7')">7</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('8')">8</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('9')">9</button></div>
                <div class="col-4"><button class="btn btn-outline-danger w-100 py-2" onclick="clearPin()">C</button></div>
                <div class="col-4"><button class="btn btn-light w-100 py-2 border" onclick="pressPin('0')">0</button></div>
                <div class="col-4"><button class="btn btn-catfe-primary w-100 py-2" onclick="enterPin()"><i class="bi bi-arrow-return-left"></i></button></div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let chartInstance = null;
    function initChart() {
        if (chartInstance) return;
        const ctx = document.getElementById('chartVentasHora');
        if (!ctx) return;
        chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['8 am', '10 am', '12 pm', '2 pm', '4 pm (Pico)', '6 pm (Pico)', '8 pm'],
                datasets: [{
                    label: 'Ventas en COP ($)',
                    data: [45000, 78000, 62000, 95000, 185000, 142000, 60000],
                    borderColor: '#C05805',
                    backgroundColor: 'rgba(219, 149, 1, 0.15)',
                    fill: true,
                    tension: 0.35,
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { ticks: { callback: value => '$' + value.toLocaleString() } }
                }
            }
        });
    }

    function handleLogin() {
        document.getElementById('screen-login').classList.add('d-none');
        document.getElementById('app-wrapper').classList.remove('d-none');
        showToast('¡Bienvenido Administrador Brayan Cuta!', 'success');
        setTimeout(initChart, 200);
    }

    function logout() {
        document.getElementById('app-wrapper').classList.add('d-none');
        document.getElementById('screen-login').classList.remove('d-none');
        showToast('Sesión cerrada con éxito', 'info');
    }

    function togglePass() {
        const p = document.getElementById('loginPass');
        const icon = document.getElementById('eyeIcon');
        if (p.type === 'password') {
            p.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            p.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }

    let pinVal = "";
    function pressPin(n) {
        if (pinVal.length < 4) {
            pinVal += n;
            document.getElementById('pinInput').value = pinVal;
        }
        if (pinVal.length === 4) enterPin();
    }
    function clearPin() {
        pinVal = "";
        document.getElementById('pinInput').value = "";
    }
    function enterPin() {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalPinLogin'));
        if (modal) modal.hide();
        clearPin();
        handleLogin();
    }

    function switchSection(sectionId, element) {
        document.querySelectorAll('.content-section').forEach(s => s.classList.add('d-none'));
        const target = document.getElementById('section-' + sectionId);
        if (target) target.classList.remove('d-none');

        document.querySelectorAll('.catfe-sidebar .nav-link').forEach(l => l.classList.remove('active'));
        if (element && element.classList.contains('nav-link')) element.classList.add('active');

        if (sectionId === 'dashboard') initChart();
    }

    function selectMobileItem(element) {
        document.querySelectorAll('.bottom-nav-item').forEach(b => b.classList.remove('active'));
        element.classList.add('active');
    }

    function gestionarMesa(numero, nombre, estado) {
        showToast(`Gestionando ${nombre} (${estado})`, 'info');
        switchSection('detalle');
    }

    function filterCategory(cat, btn) {
        document.querySelectorAll('#pillsCategory button').forEach(b => {
            b.classList.remove('active', 'btn-catfe-primary');
            b.classList.add('btn-outline-secondary');
        });
        btn.classList.add('active', 'btn-catfe-primary');
        btn.classList.remove('btn-outline-secondary');

        document.querySelectorAll('.product-item').forEach(item => {
            if (cat === 'todos' || item.dataset.category === cat) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function filterMenuCards() {
        const query = document.getElementById('searchMenuInput').value.toLowerCase();
        document.querySelectorAll('.product-item').forEach(item => {
            const name = item.dataset.name;
            item.style.display = name.includes(query) ? 'block' : 'none';
        });
    }

    function abrirModalPersonalizar(nombre, precio) {
        document.getElementById('modalItemTitle').innerText = 'Personalizar ' + nombre;
        document.getElementById('modalItemBasePrice').innerText = '$' + precio.toLocaleString() + ' COP Base';
    }
    function guardarPersonalizacion() {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalPersonalizar'));
        if (modal) modal.hide();
        showToast('Bebida personalizada agregada a la mesa', 'success');
    }

    function ajustarValor(id, delta) {
        const input = document.getElementById(id);
        let val = parseInt(input.value) || 0;
        val = Math.max(0, val + delta);
        input.value = val;
    }

    function updateCharCount(textarea) {
        document.getElementById('charCount').innerText = `${textarea.value.length} / 150`;
    }

    function guardarProducto() {
        showToast('¡Producto guardado exitosamente en el estante de inventario!', 'success');
        switchSection('inventario');
    }

    let filaAEliminar = null;
    function confirmarEliminarFila(btn) {
        filaAEliminar = btn.closest('tr');
        showModalEliminar();
    }
    function showModalEliminar() {
        const modal = new bootstrap.Modal(document.getElementById('modalConfirmarEliminar'));
        modal.show();
    }
    function ejecutarEliminacion() {
        if (filaAEliminar) {
            filaAEliminar.remove();
            filaAEliminar = null;
        }
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalConfirmarEliminar'));
        if (modal) modal.hide();
        showToast('Elemento eliminado del listado', 'danger');
    }

    function toggleAllChecks(master) {
        document.querySelectorAll('.row-check').forEach(c => c.checked = master.checked);
    }

    function verDetallePedido(id) {
        switchSection('detalle');
        showToast(`Consultando detalles del pedido #${id}`, 'info');
    }

    function showToast(msg, type = 'success') {
        const toastEl = document.getElementById('catfeToast');
        document.getElementById('toastMessage').innerText = msg;
        toastEl.className = 'toast align-items-center text-white border-0';
        if (type === 'success') toastEl.classList.add('bg-success');
        else if (type === 'danger') toastEl.classList.add('bg-danger');
        else toastEl.classList.add('bg-dark');

        const toast = new bootstrap.Toast(toastEl, { delay: 3500 });
        toast.show();
    }

    // Modo de captura automática por parámetros URL (?view=dashboard, ?view=mesas, etc.)
    window.addEventListener('DOMContentLoaded', () => {
        const params = new URLSearchParams(window.location.search);
        const view = params.get('view');
        if (view && view !== 'login') {
            document.getElementById('screen-login').classList.add('d-none');
            document.getElementById('app-wrapper').classList.remove('d-none');
            if (view === 'modal') {
                switchSection('menu');
                const modal = new bootstrap.Modal(document.getElementById('modalPersonalizar'));
                modal.show();
            } else if (view === 'error') {
                switchSection('formularios');
                document.getElementById('prodNombre').classList.add('is-invalid');
                document.getElementById('prodCategoria').classList.add('is-invalid');
                showToast('Error: Completa los campos obligatorios marcados en rojo', 'danger');
            } else if (view === 'mobile') {
                switchSection('mesas');
            } else {
                switchSection(view);
            }
            setTimeout(initChart, 100);
        }
    });
</script>
</body>
</html>
