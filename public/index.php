<?php
// Archivo de vista principal con los 10 componentes interactivos
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
            <div class="toast-body" id="toastMessage">
                ¡Acción completada!
            </div>
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
                 style="background: linear-gradient(135deg, rgba(46,35,0,0.85), rgba(192,88,5,0.85)), url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=800&q=80') center/cover;">
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
                    <p class="text-muted small">Ingresa tus credenciales para acceder al sistema.</p>
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
                            <a href="#" class="small text-decoration-none" style="color: var(--color-bronze);" onclick="showToast('Enlace de recuperación enviado al administrador', 'info')">¿Olvidaste tu contraseña?</a>
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
        <button class="btn btn-link text-dark p-0 me-2" onclick="toggleSidebar()">
            <i class="bi bi-list fs-2"></i>
        </button>
        <span class="navbar-brand fw-bold mb-0" style="color: var(--color-bark);">🐾 Cat-fé</span>
        <button class="btn btn-sm btn-outline-danger" onclick="logout()">
            <i class="bi bi-box-arrow-right"></i>
        </button>
    </nav>

    <!-- 10. SIDEBAR LATERAL FIJO (DESKTOP) -->
    <aside class="catfe-sidebar" id="sidebarMenu">
        <div>
            <div class="d-flex align-items-center justify-content-between mb-4 px-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="fs-4">🐾</span>
                    <div>
                        <h5 class="mb-0 fw-bold brand-title">Cat-fé</h5>
                        <small class="text-white-50" style="font-size: 0.7rem;">Star-Light Cafetería</small>
                    </div>
                </div>
                <button class="btn-close btn-close-white d-lg-none" onclick="toggleSidebar()"></button>
            </div>

            <nav class="nav flex-column">
                <a class="nav-link active" onclick="switchSection('dashboard', this)"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a class="nav-link" onclick="switchSection('menu', this)"><i class="bi bi-cup-hot"></i> Menú Digital</a>
                <a class="nav-link" onclick="switchSection('listados', this)"><i class="bi bi-table"></i> Listados / Tablas</a>
                <a class="nav-link" onclick="switchSection('formularios', this)"><i class="bi bi-pencil-square"></i> Nuevo Producto</a>
                <a class="nav-link" onclick="switchSection('detalle', this)"><i class="bi bi-receipt"></i> Detalle de Pedido</a>
                <a class="nav-link" onclick="switchSection('reportes', this)"><i class="bi bi-bar-chart-line"></i> Reportes & Mermas</a>
            </nav>
        </div>

        <div class="border-top border-secondary pt-3">
            <div class="d-flex align-items-center gap-2 mb-2 px-2">
                <div class="rounded-circle bg-warning text-dark fw-bold d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">BC</div>
                <div class="overflow-hidden">
                    <div class="small fw-bold text-truncate">Brayan Cuta</div>
                    <div class="text-white-50" style="font-size: 0.7rem;">Administrador</div>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-light w-100" onclick="logout()">
                <i class="bi bi-box-arrow-left me-1"></i> Cerrar Sesión
            </button>
        </div>
    </aside>

    <!-- 10. BOTTOM NAVIGATION BAR FIJA (MOBILE) -->
    <div class="bottom-nav-mobile">
        <div class="bottom-nav-item active" onclick="switchSection('dashboard', this); updateMobileNav(this);"><i class="bi bi-speedometer2"></i>Inicio</div>
        <div class="bottom-nav-item" onclick="switchSection('menu', this); updateMobileNav(this);"><i class="bi bi-cup-hot"></i>Menú</div>
        <div class="bottom-nav-item" onclick="switchSection('listados', this); updateMobileNav(this);"><i class="bi bi-table"></i>Órdenes</div>
        <div class="bottom-nav-item" onclick="switchSection('reportes', this); updateMobileNav(this);"><i class="bi bi-bar-chart-line"></i>Reportes</div>
    </div>

    <!-- CONTENEDOR PRINCIPAL DINÁMICO -->
    <main class="main-content">

        <!-- ========================================== -->
        <!-- 2. PANTALLA: DASHBOARD (PANEL PRINCIPAL)   -->
        <!-- ========================================== -->
        <section id="section-dashboard" class="content-section">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Panel Principal</h2>
                    <p class="text-muted mb-0 small">Métricas operativas y actividad en tiempo real de Star-Light.</p>
                </div>
                <button class="btn btn-catfe-accent btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoPedido">
                    <i class="bi bi-plus-circle me-1"></i> Tomar Comanda Rápida
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
                                <span class="text-muted small fw-semibold">Top Seller</span>
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
        <!-- 3. PANTALLA: MENÚ (GESTIÓN E INTERFAZ)     -->
        <!-- ========================================== -->
        <section id="section-menu" class="content-section d-none">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                <div>
                    <h2 class="fw-bold mb-1" style="color: var(--color-bark);">Menú Digital</h2>
                    <p class="text-muted mb-0 small">Catálogo interactivo con alérgenos y disponibilidad en tiempo real.</p>
                </div>
                <!-- Buscador con autocompletado en tiempo real -->
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
                <!-- Card 1 -->
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
                                <span class="badge badge-goldenrod">Top Seller</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" checked id="switch1" onchange="showToast('Disponibilidad actualizada en barra', 'success')">
                                    <label class="form-check-label small" for="switch1">Disponible</label>
                                </div>
                                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalPersonalizar" onclick="abrirModalPersonalizar('Capuchino Especial', 8500)">
                                    <i class="bi bi-sliders"></i> Personalizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
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
                                <span class="badge bg-light text-dark border">Lácteos</span>
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

                <!-- Card 3 -->
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

                <!-- Card 4 (Agotado) -->
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

            <!-- Tabla de Datos -->
            <div class="card card-catfe p-0 overflow-hidden mb-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 40px;"><input type="checkbox" class="form-check-input" id="checkAll" onclick="toggleAllChecks(this)"></th>
                                <th>ID <i class="bi bi-arrow-down-up small cursor-pointer" onclick="sortTable(1)"></i></th>
                                <th>Cliente / Mesa</th>
                                <th>Fecha & Hora</th>
                                <th>Total ($) <i class="bi bi-arrow-down-up small cursor-pointer" onclick="sortTable(4)"></i></th>
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
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-check"></td>
                                <td class="fw-bold">#106</td>
                                <td>Mesa 5 (Cliente Mostrador)</td>
                                <td>Hoy 13:50</td>
                                <td class="fw-bold">$20.500</td>
                                <td><span class="badge bg-secondary">Entregado</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" onclick="verDetallePedido(106)"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarFila(this)"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" class="form-check-input row-check"></td>
                                <td class="fw-bold">#105</td>
                                <td>Mesa 2 (Sofía Martínez)</td>
                                <td>Hoy 13:20</td>
                                <td class="fw-bold">$30.000</td>
                                <td><span class="badge bg-secondary">Entregado</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary" onclick="verDetallePedido(105)"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarFila(this)"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginación Inferior Fija -->
                <div class="d-flex flex-wrap justify-content-between align-items-center p-3 border-top bg-light gap-2">
                    <div class="d-flex align-items-center gap-2 small text-muted">
                        Mostrar:
                        <select class="form-select form-select-sm" style="width: 70px;">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                        de 48 registros totales
                    </div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                            <li class="page-item active"><a class="page-link btn-catfe-primary text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
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
                        <!-- Columna 1 -->
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

                        <!-- Columna 2 -->
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
                <!-- Panel Izquierdo: Datos de la Mesa y Notas -->
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

                        <!-- Línea de Tiempo (Timeline) -->
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

                <!-- Panel Derecho: Desglose de Productos y Precuenta -->
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
                    <p class="text-muted mb-0 small">Análisis de productos estrella (*Top Sellers*) y control financiero de mermas.</p>
                </div>

                <!-- Filtros de Fecha + Botones de Descarga PDF / Excel -->
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

            <!-- Resúmenes Analíticos de Desperdicios / Mermas -->
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
                        <h5 class="fw-bold mb-3" style="color: var(--color-bark);">Ranking de Productos Más Vendidos</h5>
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

<!-- MODAL DE CONFIRMACIÓN DE ELIMINACIÓN -->
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

<!-- MODAL DE PERSONALIZACIÓN DE PEDIDO -->
<div class="modal fade" id="modalPersonalizar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-catfe">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title fw-bold" id="modalItemTitle">Personalizar Bebida</h5>
                    <small class="text-muted" id="modalItemBasePrice">$8.500 COP</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Tipo de Leche -->
                <div class="mb-3">
                    <label class="form-label small fw-bold">Tipo de Leche:</label>
                    <select class="form-select form-select-sm">
                        <option>Entera Tradicional</option>
                        <option>Deslactosada</option>
                        <option>Almendra (+ $2.000)</option>
                        <option>Avena (+ $2.000)</option>
                    </select>
                </div>

                <!-- Nivel de Azúcar -->
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

                <!-- Extras -->
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

<!-- MODAL ACCESO CON PIN (CAJEROS EN TABLET) -->
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
    // Inicializar Chart.js en Dashboard
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
                    borderColor: '#C05805', // Bronze
                    backgroundColor: 'rgba(219, 149, 1, 0.15)', // Goldenrod transparente
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

    // Login & Logout
    function handleLogin() {
        const email = document.getElementById('loginEmail');
        const pass = document.getElementById('loginPass');
        if (!email.value || !pass.value) {
            email.classList.add('is-invalid');
            pass.classList.add('is-invalid');
            showToast('Por favor completa todos los campos', 'danger');
            return;
        }
        document.getElementById('screen-login').classList.add('d-none');
        document.getElementById('app-wrapper').classList.remove('d-none');
        showToast('¡Bienvenido a Cat-fé, Brayan Cuta!', 'success');
        setTimeout(initChart, 200);
    }

    function logout() {
        document.getElementById('app-wrapper').classList.add('d-none');
        document.getElementById('screen-login').classList.remove('d-none');
        showToast('Sesión cerrada con éxito', 'info');
    }

    // Toggle Password
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

    // PIN Pad
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

    // Navegación entre Secciones
    function switchSection(sectionId, element) {
        document.querySelectorAll('.content-section').forEach(s => s.classList.add('d-none'));
        const target = document.getElementById('section-' + sectionId);
        if (target) target.classList.remove('d-none');

        document.querySelectorAll('.catfe-sidebar .nav-link').forEach(l => l.classList.remove('active'));
        if (element && element.classList.contains('nav-link')) element.classList.add('active');

        // Cerrar sidebar en móvil si estaba abierto
        const sidebar = document.getElementById('sidebarMenu');
        sidebar.classList.remove('show');

        if (sectionId === 'dashboard') initChart();
    }

    function updateMobileNav(element) {
        document.querySelectorAll('.bottom-nav-item').forEach(b => b.classList.remove('active'));
        element.classList.add('active');
    }

    function toggleSidebar() {
        document.getElementById('sidebarMenu').classList.toggle('show');
    }

    // Filtros del Menú
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

    // Personalización Modal
    function abrirModalPersonalizar(nombre, precio) {
        document.getElementById('modalItemTitle').innerText = 'Personalizar ' + nombre;
        document.getElementById('modalItemBasePrice').innerText = '$' + precio.toLocaleString() + ' COP Base';
    }
    function guardarPersonalizacion() {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalPersonalizar'));
        if (modal) modal.hide();
        showToast('Bebida personalizada agregada a la mesa', 'success');
    }

    // Ajuste de Valores (+ / -)
    function ajustarValor(id, delta) {
        const input = document.getElementById(id);
        let val = parseInt(input.value) || 0;
        val = Math.max(0, val + delta);
        input.value = val;
    }

    function updateCharCount(textarea) {
        document.getElementById('charCount').innerText = `${textarea.value.length} / 150`;
    }

    // Guardar Producto
    function guardarProducto() {
        const nombre = document.getElementById('prodNombre');
        const cat = document.getElementById('prodCategoria');
        const precio = document.getElementById('prodPrecio');
        let valid = true;

        if (nombre.value.trim().length < 3) {
            nombre.classList.add('is-invalid');
            valid = false;
        } else nombre.classList.remove('is-invalid');

        if (!cat.value) {
            cat.classList.add('is-invalid');
            valid = false;
        } else cat.classList.remove('is-invalid');

        if (parseInt(precio.value) <= 0) {
            precio.classList.add('is-invalid');
            valid = false;
        } else precio.classList.remove('is-invalid');

        if (valid) {
            showToast('¡Producto guardado exitosamente en el catálogo!', 'success');
            document.getElementById('formProducto').reset();
            switchSection('menu');
        } else {
            showToast('Revisa los campos con bordes rojos', 'danger');
        }
    }

    // Listados
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

    // Toasts
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
</script>
</body>
</html>
