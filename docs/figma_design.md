# GUÍA DE DISEÑO UX/UI, SISTEMA DE DISEÑO Y PROTOTIPO (SESIÓN 4)
## PROYECTO: SISTEMA INTELIGENTE DE GESTIÓN "CAT-FÉ"
### ESTABLECIMIENTO: CAFETERÍA DE ESPECIALIDAD "STAR-LIGHT"

* **Aprendiz:** Brayan Santiago Cuta
* **Instructora:** Joan Castillo Celis
* **Ficha de Caracterización:** ADSO
* **Fecha:** Noviembre de 2026
* **Herramientas:** Figma (Desktop 1440px / Mobile 390px) + Android Studio (Jetpack Compose)
* **Repositorio GitHub:** [Cafeteria-Inteligente-Cat-fe](https://github.com/brayansantiagocuta-eng/Cafeteria-Inteligente-Cat-fe)
* **Enlace Figma Community UI Kit:** [Figma Mobile UI Kit E-commerce](https://www.figma.com/design/GwgEthn0stK0FE0I2I3cNi/Mobile-UI-Kit--Ecommerce--Community-?node-id=134-12)

---

## 1. PALETA DE COLORES OFICIAL (INSPIRACIÓN CANVA)

| Tono | Hexadecimal | Aplicación en el Sistema Cat-fé |
| :--- | :---: | :--- |
| **Bark (Corteza Oscura)** | `#2E2300` | Color primario: Sidebar, Navbar, botones principales y títulos de encabezado. |
| **Seaweed Green (Verde Alga)** | `#6E6702` | Color de éxito: Mesas libres/disponibles, ventas del día en positivo y despachos listos. |
| **Bronze (Bronce Cálido)** | `#C05805` | Color secundario: Hover activo, timeline de pedidos en cocina, mesas ocupadas. |
| **Goldenrod (Vara de Oro)** | `#DB9501` | Color de resalte: Badges de Top Vendidos, círculos activos en barra móvil y teclado PIN. |
| **Fondo Crema Off-White** | `#FBF9F5` | Fondo general para descanso visual y contraste ergonómico. |

---

## 2. ESPECIFICACIÓN DE LOS 10 MÓDULOS DEL SISTEMA

1. **Login (Acceso al Sistema):** Pantalla dividida con fotografía minimalista de café a la izquierda y formulario con botón de acceso por PIN numérico para tabletas.
2. **Dashboard (Panel Principal):** 4 tarjetas métricas KPIs (ventas del día, pedidos pendientes, Top Vendidos, ticket promedio), gráfico interactivo de ventas por hora y actividad reciente en barra.
3. **Plano de Mesas Arquitectónico:** Salón distribuido por zonas: Cabinas privadas verdes (B-01 a B-04), Salón Central azul en 2 pasillos (C-01 a C-08), Lounge familiar rosado (L-01 a L-03) y barra semicircular.
4. **Estante Modular de Inventario:** Visualización en estantería física con cajas amarillas ilustradas (Nivel 1 granos, Nivel 2 repostería con alerta de caducidad en 48h, Nivel 3 leches y descartables).
5. **Menú Digital Interactivo:** Pestañas superiores por categoría (Cafés, Frías, Repostería, Desayunos), buscador reactivo con autocompletado y switches de disponibilidad.
6. **Listados (Tablas de Datos):** Tabla de pedidos con selección en lote, ordenamiento por columnas y paginación fija (10, 25, 50).
7. **Formularios en 2 Columnas:** Registro de producto con botones +/- para precios/stock, dropdowns de categoría y contador de caracteres (0/150).
8. **Vista de Detalle (Ficha de Pedido #108):** Panel con datos de mesa, notas especiales y línea de tiempo (Timeline): *Recibido ☕ -> En cocina 🍪 -> Listo para entrega ✔️*.
9. **Modales Emergentes:** Modal con backdrop oscuro para confirmar eliminación y modal de personalización de bebida (leche de almendra, nivel de azúcar, extra shot).
10. **Reportes & Mermas:** Análisis de Top Vendidos y reporte financiero de pérdidas por desperdicio agrupado por causa (`-$47.600 COP`), con exportación a PDF y Excel.

---

## 3. ADAPTABILIDAD RESPONSIVE Y MÓVIL
* **Desktop (1440px):** Sidebar colapsable con expansión automática por hover (`:hover`).
* **Mobile (390px):** Barra inferior fija (Bottom Nav) con selector en **círculo claro (`#DB9501`)** al tocar cada módulo.
