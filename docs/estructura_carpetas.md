# Estructura del Proyecto Cat-fé 🐾☕

Este proyecto integra dos componentes principales:
1. **Sistema Web Full Stack (PHP 8 + MySQL + Bootstrap 5 + JS)** bajo arquitectura MVC (Requerimiento obligatorio ADSO).
2. **Aplicación Móvil Nativa para Salón (Android / Kotlin)** para la toma de comandas en mesa sincronizada con la API REST.

---

## Árbol General de Carpetas

```text
Cat-fé/
│
├── app/                        # NÚCLEO MVC (BACKEND PHP)
│   ├── config/                 # Conexión PDO a MySQL (database.php)
│   ├── controllers/            # Controladores del flujo de negocio
│   │   ├── AuthController.php
│   │   ├── MesaController.php
│   │   ├── ComandaController.php
│   │   ├── ProductoController.php
│   │   └── MermaController.php
│   ├── models/                 # Modelos de datos y consultas SQL
│   │   ├── Usuario.php
│   │   ├── Mesa.php
│   │   ├── Pedido.php
│   │   ├── Producto.php
│   │   └── Merma.php
│   └── views/                  # Vistas renderizadas (HTML5 + Bootstrap 5)
│       ├── layouts/            # Encabezado (header) y pie de página (footer)
│       ├── auth/               # Vista de login
│       ├── mesas/              # Salón y mapa de mesas
│       ├── comandas/           # Pantalla de barra (KDS) y toma de comanda
│       ├── inventario/         # Catálogo de productos
│       └── reportes/           # Dashboard analítico (Top Sellers y Mermas)
│
├── public/                     # ACCESO PÚBLICO (FRONTEND WEB Y API REST)
│   ├── css/                    # Estilos CSS personalizados
│   ├── js/                     # Scripts interactivos JavaScript vanilla
│   ├── img/                    # Logotipos e imágenes de productos
│   ├── api.php                 # Endpoint API REST consumido por la app Kotlin
│   └── index.php               # Front Controller (Enrutador de la aplicación web)
│
├── database/                   # SCRIPTS SQL Y BASE DE DATOS
│   ├── schema.sql              # Creación de tablas y llaves foráneas (DDL)
│   ├── datos_prueba.sql        # Inserción de datos iniciales de prueba (DML)
│   └── consultas.sql           # Consultas SQL analíticas (JOIN, GROUP BY, SUM)
│
├── docs/                       # DOCUMENTACIÓN TÉCNICA Y EVIDENCIAS ADSO
│   ├── investigacion.md        # Sesión 1: Entrevista, observación y encuesta real
│   ├── requisitos.md           # Sesión 2: Especificación IEEE 29148 (RF, RNF, HU, RN)
│   ├── trazabilidad.md         # Sesión 3: Backlog Jira y Matriz RTM
│   ├── figma_design.md         # Sesión 4: Paleta, tipografía y 10 pantallas
│   └── jira_historias_limpias.csv # Archivo para importación ágil en Jira
│
├── mobile_kotlin/              # APLICACIÓN MÓVIL NATIVA (ANDROID STUDIO)
│   └── app/
│       ├── build.gradle        # Dependencias (Retrofit, Gson, Material Design)
│       └── src/main/
│           ├── AndroidManifest.xml # Permisos de red e Internet
│           ├── java/com/catfe/app/
│           │   ├── MainActivity.kt         # Salón y monitoreo de mesas
│           │   ├── TomarComandaActivity.kt # Toma y envío de pedidos
│           │   ├── models/Models.kt        # Data classes (Mesa, Producto, Comanda)
│           │   └── network/CatfeApiService.kt # Cliente Retrofit apuntando a XAMPP
│           └── res/layout/
│               ├── activity_main.xml       # Diseño visual de salón móvil
│               └── activity_tomar_comanda.xml # Diseño visual de comanda
│
├── tests/                      # PRUEBAS UNITARIAS Y DE INTEGRACIÓN
│   └── .gitkeep
│
├── .gitignore                  # Exclusiones de Git
├── index.php                   # Redirección rápida a public/
└── README.md                   # Ficha técnica principal del repositorio
