# SERVICIO NACIONAL DE APRENDIZAJE (SENA)
## CENTRO DE GESTIÓN DE MERCADOS, LOGÍSTICA Y TECNOLOGÍAS DE LA INFORMACIÓN
### TECNÓLOGO EN ANÁLISIS Y DESARROLLO DE SOFTWARE (ADSO)

---

# SESIÓN 3: GESTIÓN ÁGIL, BACKLOG EN JIRA Y MATRIZ DE TRAZABILIDAD
## PROYECTO: SISTEMA INTELIGENTE DE GESTIÓN "CAT-FÉ"
### ESTABLECIMIENTO: CAFETERÍA DE ESPECIALIDAD "STAR-LIGHT"

* **Aprendiz:** Brayan Santiago Cuta
* **Instructora:** Joan Castillo Celis
* **Ficha de Caracterización:** ADSO
* **Fecha:** Noviembre de 2026
* **Repositorio GitHub:** [Cafeteria-Inteligente-Cat-fe](https://github.com/brayansantiagocuta-eng/Cafeteria-Inteligente-Cat-fe)

---

## 1. CONFIGURACIÓN DEL PROYECTO SCRUM EN JIRA

* **Herramienta:** Atlassian Jira Software (Plantilla Scrum).
* **Nombre del Proyecto:** Cat-fé - Gestión Gastronómica Inteligente.
* **Clave del Proyecto (Key):** `CAT`
* **Líder del Proyecto:** Brayan Santiago Cuta (Product Owner / Developer).
* **Duración del Sprint:** 12 sesiones de desarrollo (Sprint único integral de construcción y entrega).

### 1.1 Flujo de Estados del Tablero (Workflow)
El tablero Kanban/Scrum de Jira se configura con las 5 columnas estándar de ciclo de vida:

```mermaid
flowchart LR
    B["1. BACKLOG"] --> TD["2. TO DO"]
    TD --> IP["3. IN PROGRESS"]
    IP --> TE["4. TESTING"]
    TE --> D["5. DONE"]
```

1. **BACKLOG:** Historias de usuario y requerimientos priorizados pendientes de entrar al ciclo de trabajo activo.
2. **TO DO (Por Hacer):** Tareas del sprint listas para iniciar desarrollo.
3. **IN PROGRESS (En Progreso):** Tarea en desarrollo activo (codificación en PHP, modelado SQL o maquetación Bootstrap).
4. **TESTING (En Pruebas):** Validación funcional, pruebas de integración y verificación de criterios de aceptación.
5. **DONE (Terminado):** Funcionalidad probada, documentada y con commit subido a la rama `main` en GitHub.

---

## 2. ESTRUCTURA DE ÉPICAS DEL SISTEMA

El alcance de **Cat-fé** se descompone en 6 Épicas estratégicas que agrupan las 12 historias de usuario:

| ID Épica | Nombre de la Épica | Descripción del Módulo |
| :---: | :--- | :--- |
| **EP-01** | Seguridad y Control de Acceso | Autenticación de usuarios, cifrado de credenciales y gestión de roles (`Administrador`, `Mesero`, `Barista`). |
| **EP-02** | Catálogo e Inventario Dinámico | Gestión de productos perecederos e insumos, control de stock y alertas preventivas de caducidad. |
| **EP-03** | Salón, Mesas y Comandas | Control visual de mesas en tiempo real, registro de órdenes digitales y traslado de comandas entre mesas. |
| **EP-04** | Despacho y Operación en Barra | Pantalla de cocina/barra para recepción cronológica de pedidos y confirmación de preparación. |
| **EP-05** | Precuenta, Facturación y Caja | Cálculo automatizado de consumos, cobro multimoneda/datáfono y arqueo de caja de la jornada. |
| **EP-06** | Analítica de Rotación y Mermas (Innovación) | Ranking de productos más vendidos (*Top Sellers*) y registro, costeo y reportes de desperdicios/mermas. |

---

## 3. PRODUCT BACKLOG, ESTIMACIÓN (STORY POINTS) Y DESGLOSE EN TASKS

Las estimaciones se definen bajo la escala de Fibonacci (1, 2, 3, 5, 8 Story Points) según la complejidad técnica y el impacto arquitectónico MVC.

| ID Story | Épica | Historia de Usuario | Story Points | Prioridad | Desglose en Tareas Técnicas (Tasks en Jira) |
| :---: | :---: | :--- | :---: | :---: | :--- |
| **HU-01** | EP-01 | Inicio de sesión seguro y redirección por rol | 3 | Alta | **TASK-01:** Crear tabla `usuario` con campo contraseña hash.<br>**TASK-02:** Desarrollar `AuthController.php` y validación de sesión.<br>**TASK-03:** Maquetar vista de login responsive en Bootstrap. |
| **HU-02** | EP-03 | Visualización interactiva de mesas por estados | 3 | Alta | **TASK-04:** Crear tabla `mesa` con estados (`Disponible`, `Ocupada`, `Por cobrar`).<br>**TASK-05:** Desarrollar `MesaModel.php` y consultas de estado.<br>**TASK-06:** Diseñar grilla visual de mesas con código de colores. |
| **HU-03** | EP-03 | Registro de comanda digital con notas de preparación | 5 | Alta | **TASK-07:** Crear tablas `pedido` y `detalle_pedido`.<br>**TASK-08:** Desarrollar controlador para agregar ítems dinámicamente.<br>**TASK-09:** Interfaz táctil de selección de menú y notas de comanda. |
| **HU-04** | EP-04 | Pantalla de barra para despacho de pedidos | 5 | Alta | **TASK-10:** Crear vista interactiva de comandas para barista.<br>**TASK-11:** Implementar endpoint para actualizar estado a `En preparación` / `Listo`.<br>**TASK-12:** Notificación visual al mesero cuando la orden está despachada. |
| **HU-05** | EP-05 | Generación de precuenta y detalle de cobro | 3 | Alta | **TASK-13:** Crear consulta SQL para liquidar totales e impuestos de la mesa.<br>**TASK-14:** Desarrollar vista modal de precuenta con formato limpio para el cliente. |
| **HU-06** | EP-02 | CRUD de catálogo y control de existencias | 5 | Alta | **TASK-15:** Crear tabla `producto` con precio, costo, stock y unidad.<br>**TASK-16:** Desarrollar `ProductoController.php` con operaciones CRUD.<br>**TASK-17:** Vista de inventario con buscador y paginación. |
| **HU-07** | EP-06 | Registro y tipificación de mermas/desperdicios | 5 | Alta (Innovación) | **TASK-18:** Crear tabla `merma` con motivo, cantidad, costo unitario y fecha.<br>**TASK-19:** Desarrollar formulario de registro rápido en barra.<br>**TASK-20:** Descontar existencias de inventario tras registrar merma. |
| **HU-08** | EP-06 | Dashboard analítico de productos más vendidos | 8 | Alta (Innovación) | **TASK-21:** Crear consulta SQL analítica con `COUNT`, `SUM`, `GROUP BY` y filtros de fecha.<br>**TASK-22:** Implementar controlador y servicio de estadísticas de venta.<br>**TASK-23:** Renderizar gráfico de barras/pastel con productos estrella (*Top Sellers*). |
| **HU-09** | EP-06 | Reporte financiero de impacto de desperdicios | 5 | Alta (Innovación) | **TASK-24:** Crear consulta SQL de consolidación de pérdidas monetarias agrupadas por motivo.<br>**TASK-25:** Diseñar vista de reporte con indicadores de porcentaje y total en pesos ($). |
| **HU-10** | EP-05 | Arqueo y cierre de caja de la jornada | 5 | Alta | **TASK-26:** Crear tabla `cierre_caja` con balance por método de pago.<br>**TASK-27:** Desarrollar lógica de inmutabilidad y bloqueo de ventas tras el cierre.<br>**TASK-28:** Vista de resumen de caja y arqueo diario. |
| **HU-11** | EP-03 | Traslado de comandas activas entre mesas | 3 | Media | **TASK-29:** Crear procedimiento de actualización de `mesa_id` en pedidos abiertos.<br>**TASK-30:** Modal de confirmación de cambio de mesa en la vista del mesero. |
| **HU-12** | EP-02 | Monitoreo de alertas preventivas de caducidad | 5 | Alta (Innovación) | **TASK-31:** Añadir campo `fecha_caducidad` en insumos perecederos.<br>**TASK-32:** Lógica de comparación de fechas (< 48 horas).<br>**TASK-33:** Tarjetas de alerta visual en el panel del administrador. |

* **Total Story Points del Backlog:** **55 SP**

---

## 4. MATRIZ DE TRAZABILIDAD DE REQUISITOS (RTM)

La siguiente matriz garantiza la trazabilidad bidireccional requerida por la norma ISO/IEC/IEEE 29148:2018, enlazando cada requisito con su historia de usuario, módulo, funcionalidad, caso de prueba y estado en el ciclo de vida:

| Requisito (RF) | Historia (HU) | Épica / Módulo | Funcionalidad Implementada | Caso de Prueba (CP) | Estado |
| :---: | :---: | :---: | :--- | :---: | :---: |
| **RF-01** | HU-01 | EP-01 Seguridad | Login con hash BCRYPT y redirección de roles | CP-01 | En desarrollo |
| **RF-02** | HU-06 | EP-02 Inventario | CRUD completo de productos y categorías | CP-02 | En desarrollo |
| **RF-03** | HU-02 | EP-03 Mesas | Gestión de estados visuales de mesas | CP-03 | En desarrollo |
| **RF-04** | HU-03 | EP-03 Comandas | Comanda digital enviada a barra con notas | CP-04 | En desarrollo |
| **RF-05** | HU-04 | EP-04 Barra | Pantalla de recepción y despacho cronológico | CP-05 | En desarrollo |
| **RF-06** | HU-05 | EP-05 Facturación | Cálculo de precuenta y liberación de mesa | CP-06 | En desarrollo |
| **RF-07** | HU-10 | EP-05 Caja | Registro de pagos múltiples y cierre de turno | CP-07 | En desarrollo |
| **RF-08** | HU-06 | EP-02 Inventario | Descuento automático de stock tras venta | CP-08 | En desarrollo |
| **RF-09** | HU-03 | EP-02 Inventario | Bloqueo automático de productos con stock en 0 | CP-09 | En desarrollo |
| **RF-10** | HU-08 | EP-06 Analítica (Innovación) | Ranking Top Sellers por volumen y monto ($) | CP-10 | En desarrollo |
| **RF-11** | HU-07 | EP-06 Mermas (Innovación) | Tipificación y costeo de pérdidas operativas | CP-11 | En desarrollo |
| **RF-12** | HU-09 | EP-06 Mermas (Innovación) | Reporte financiero de impacto de desperdicio | CP-12 | En desarrollo |
| *(Extensión)* | HU-11 | EP-03 Mesas | Traslado de pedidos entre mesas activas | CP-13 | En desarrollo |
| *(Extensión)* | HU-12 | EP-02 Inventario (Innovación) | Alertas visuales de proximidad de caducidad | CP-14 | En desarrollo |

---

## 5. PLANIFICACIÓN DEL SPRINT

* **Nombre del Sprint:** Sprint 1 - Core Transaccional, Analítica y Mermas Cat-fé.
* **Capacidad Estimada:** 55 Story Points distribuidos a lo largo del proceso formativo de 12 sesiones.
* **Objetivo del Sprint (Sprint Goal):** Entregar un sistema web MVC funcional y sustentable para la cafetería Star-Light que gestione el flujo operativo completo de salón y barra, integrando el análisis de productos más vendidos y el control financiero de desperdicios/mermas.

---

## 6. EVIDENCIAS ASOCIADAS
* **Documento versionado en Git:** `docs/trazabilidad.md`.
* **Mapeo de ingeniería:** Matriz RTM conforme a estándares de trazabilidad IEEE.
* **Commit asociado:** `docs: agregar backlog de Jira y matriz de trazabilidad de requisitos`.
