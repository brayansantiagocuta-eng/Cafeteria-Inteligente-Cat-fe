# SESIÓN 1: INVESTIGACIÓN DEL NEGOCIO
## ESTABLECIMIENTO: CAFETERÍA "STAR-LIGHT"
## SISTEMA DE INFORMACIÓN: "CAT-FÉ"
**Tecnólogo en Análisis y Desarrollo de Software (ADSO) - SENA**  
**Aprendiz:** Brayan Santiago Cuta  
**Instructora:** Joan Castillo Celis  
**Fecha:** Noviembre de 2026  

---

## 1. DESCRIPCIÓN DEL NEGOCIO INVESTIGADO
* **Nombre comercial del establecimiento:** Star-Light (Cafetería de Especialidad y Experiencia)
* **Nombre del sistema de información web:** Cat-fé
* **Sector:** Gastronomía, café de especialidad, repostería artesanal y experiencias de servicio.
* **Modelo operativo:** Servicio a la mesa, pedidos directos en barra y pedidos para llevar (*takeaway*).
* **Actores principales del negocio:**
  1. **Administrador / Propietario:** Gestiona compras, proveedores, costos de insumos, precios de venta, control de pérdidas y supervisión general mediante el sistema Cat-fé.
  2. **Barista / Personal de Cocina:** Elabora bebidas de café de especialidad y alimentos, vigila la frescura de insumos perecederos y registra mermas por preparación o caducidad.
  3. **Mesero / Cajero:** Atiende a los clientes en mesa o mostrador, genera órdenes, procesa pagos y consulta disponibilidad en tiempo real.
  4. **Cliente final:** Disfruta del menú y del ambiente, buscando una atención rápida, pedidos correctos y cobros transparentes.

---

## 2. SITUACIÓN ACTUAL Y PROBLEMÁTICA OBSERVADA
En cafeterías de estilo moderno y de especialidad como **Star-Light**, la operación manual en horas pico genera fricciones comunes del sector:
1. **Desperdicio de insumos perecederos (mermas):** Las leches especiales (almendra, avena, deslactosada), la repostería del día y las extracciones de café mal calibradas generan pérdidas diarias que casi nunca se miden en dinero ni por causa.
2. **Falta de visibilidad de los productos estrella (*Top Sellers*):** Las compras de café en grano e ingredientes se realizan de manera intuitiva, sin reportes exactos de qué productos rotan más por día o temporada.
3. **Cuellos de botella en servicio y mesas:** Comandas manuales en papel que se extravían o demoran entre salón y barra, generando demoras en la preparación y en la entrega de la cuenta.

---

## 3. INSTRUMENTO 1: ENTREVISTA AL PERSONAL ADMINISTRATIVO Y OPERATIVO
* **Entrevistado:** Administrador y Barista Principal de Star-Light.
* **Objetivo:** Identificar las necesidades operativas de la cafetería para el diseño de Cat-fé.

### Preguntas y Respuestas:
1. **¿Cómo toman y transmiten las comandas actualmente?**  
   * *Respuesta:* En papel autocopiante. El mesero anota y lleva la copia física a la barra.
2. **¿Qué problemas se presentan con este método en horas de alta afluencia?**  
   * *Respuesta:* Órdenes en espera desordenadas, pedidos duplicados o demoras cuando el personal de barra no entiende la letra del mesero.
3. **¿Cómo controlan actualmente los alimentos y bebidas que se dañan o caducan?**  
   * *Respuesta:* Al final de la jornada se desecha lo que no sirva, pero no se lleva un registro contable de cuánto dinero representó esa merma.
4. **¿Saben con exactitud qué bebidas o postres generan el 80% de los ingresos de la semana?**  
   * *Respuesta:* Tenemos una idea general, pero no contamos con un gráfico o reporte automatizado que nos indique la rotación exacta.
5. **¿Qué ocurre si se agota un insumo (por ejemplo, leche de avena o un postre de temporada) durante el servicio?**  
   * *Respuesta:* El mesero se entera después de haber tomado la orden en la mesa, teniendo que volver a disculparse con el cliente.
6. **¿Cuánto tiempo promedio toma el cuadre de caja y ventas al cierre?**  
   * *Respuesta:* Entre 45 y 60 minutos revisando comandas de papel y comprobantes de datáfono.
7. **¿Qué reportes considera indispensables en el sistema Cat-fé?**  
   * *Respuesta:* Ranking de productos más vendidos, reporte de mermas/desperdicios por motivo y costo, y balance de ventas por fecha y método de pago.
8. **¿Qué impacto tendría reducir el desperdicio de insumos un 15% o 20%?**  
   * *Respuesta:* Aumentaría de inmediato el margen neto de ganancia mensual, ya que la materia prima de cafetería de especialidad es costosa.
9. **¿Disponen de dispositivos para implementar el sistema?**  
   * *Respuesta:* Sí, contamos con computador en caja y conectividad para usar tablets o celulares para la toma de comandas.
10. **¿Qué permisos de usuario son requeridos?**  
    * *Respuesta:* Acceso total para administrador; meseros solo con permisos de tomar comandas y ver mesas; cocina/barra para cambiar estados de preparación.

---

## 4. INSTRUMENTO 2: FORMATO DE OBSERVACIÓN DIRECTA DE CAMPO

| Criterio | Registro de Campo |
| :--- | :--- |
| **Fecha y Horario:** | Sábado, 4:00 p. m. a 6:30 p. m. (Hora de mayor demanda) |
| **Lugar:** | Cafetería Star-Light (Salón y Barra de café) |
| **Actores observados:** | 1 Administrador, 2 Baristas, 2 Meseros, 28 Clientes |
| **Fase 1: Toma de comandas** | **Problema:** El mesero tarda varios minutos anotando en libreta y desplazándose hasta la barra. <br>**Oportunidad:** Comanda digital por mesa que llega inmediatamente a la pantalla de barra mediante Cat-fé. |
| **Fase 2: Preparación y mermas** | **Problema:** Descarte de preparaciones fallidas y productos vencidos sin registro alguno. <br>**Oportunidad:** Módulo de registro de desperdicios (motivos: error de receta, caducidad, accidente). |
| **Fase 3: Cobro y cierre de mesa** | **Problema:** Congestión en el mostrador para calcular manualmente consumos y dividir cuentas. <br>**Oportunidad:** Precuenta automática e inmediata por número de mesa. |

---

## 5. INSTRUMENTO 3: ENCUESTA APLICADA A CLIENTES (DATOS REALES TABULADOS)
* **Población evaluada:** Clientes y comensales de cafeterías de especialidad.
* **Muestra real consolidada:** 10 respuestas registradas en Google Forms / CSV.
* **Propósito:** Validar mediante datos empíricos las problemáticas operativas y el valor de las funcionalidades innovadoras del sistema **Cat-fé** (control de mesas, productos más vendidos y control de mermas/desperdicios).

### Tabulación de Resultados y Análisis Estadístico:

#### Pregunta 1: Al visitar una cafetería en horarios de alta concurrencia, ¿cómo califica habitualmente el tiempo de espera desde que pide su orden hasta que la recibe en la mesa?
* A) Aceptable, pero con demoras evidentes en horas pico (10 a 15 minutos): **5 votos (50.0%)**
* B) Rápido y sin contratiempos (menos de 5 minutos): **3 votos (30.0%)**
* C) Lento y con esperas excesivas (más de 15 minutos): **2 votos (20.0%)**
> **Interpretación y justificación técnica:** El **70.0%** de los encuestados reporta demoras o tiempos lentos en horarios de alta afluencia. Esto respalda la necesidad del módulo de comandas y pedidos digitales de Cat-fé, el cual envía los pedidos de mesa directamente a la barra reduciendo el tiempo de espera a menos de 5 minutos.

#### Pregunta 2: ¿Con qué frecuencia le ocurre que solicita un producto de la carta (un café especial, postre o ingrediente particular) y el personal le informa minutos después que ya no está disponible?
* A) Con frecuencia o me ha sucedido al menos una vez: **6 votos (60.0%)**
* B) Rara vez: **3 votos (30.0%)**
* C) Nunca me ha pasado: **1 voto (10.0%)**
> **Interpretación y justificación técnica:** Un **90.0%** de los encuestados ha experimentado desabastecimiento de productos ya solicitados (60% con frecuencia o al menos una vez y 30% rara vez). Esto evidencia la desconexión entre la carta física y el inventario real. Cat-fé resolverá esto bloqueando automáticamente en el menú cualquier producto agotado.

#### Pregunta 3: Al ordenar en una cafetería, ¿le resultaría útil contar con recomendaciones visibles o una sección destacada con los "Productos Más Populares / Más Vendidos" para facilitar su elección?
* A) Sí, me orienta para probar las especialidades más reconocidas y decidir más rápido: **6 votos (60.0%)**
* B) Me es indiferente: **3 votos (30.0%)**
* C) No, prefiero revisar todo el menú por mi cuenta: **1 voto (10.0%)**
> **Interpretación y justificación técnica:** El **60.0%** afirma explícitamente que una sección de productos destacados agiliza su decisión de compra, y un 30% es receptivo. Esto valida con fuerza la **funcionalidad innovadora de Análisis de Productos Más Vendidos** de Cat-fé, orientada al cross-selling y rotación óptima de carta.

#### Pregunta 4: ¿Qué tan importante considera que su cuenta o factura detalle de forma clara, automática y sin tachones cada consumo, bebida, adición o modificación solicitada?
* A) Muy importante, brinda total claridad y confianza en lo que pago: **7 votos (70.0%)**
* B) Poco importante mientras el valor total parezca razonable: **2 votos (20.0%)**
* C) No le doy importancia: **1 voto (10.0%)**
> **Interpretación y justificación técnica:** El **70.0%** exige transparencia contable inmediata y sin errores manuales. Esto justifica el módulo de precuenta digital y liquidación de mesas de Cat-fé.

#### Pregunta 5: Las cafeterías manejan insumos frescos de alta rotación (leches vegetales, frutas, repostería artesanal). ¿Qué opinión tiene para que el local utilice un sistema digital para gestionar el desperdicio de alimentos (mermas), impulsando la sostenibilidad?
* A) Excelente, demuestra responsabilidad ambiental, orden administrativo y compromiso con la frescura: **7 votos (70.0%)**
* B) Favorable, aunque para mí lo primordial es el precio final: **2 votos (20.0%)**
* C) No me parece relevante: **1 voto (10.0%)**
> **Interpretación y justificación técnica:** El **90.0%** tiene una postura positiva frente a la gestión tecnológica de desperdicios (70% excelente y 20% favorable). Esto valida con solidez la **funcionalidad innovadora de Control de Desperdicios / Mermas**, demostrando que no solo optimiza costos internos sino que fortalece la reputación del negocio.

#### Pregunta 6: Si al terminar su consumo pudiera consultar la cuenta de su mesa en un clic y pagar de inmediato sin hacer filas en el mostrador, ¿utilizaría esta opción?
* A) Sí, agilizaría mi salida y evitaría esperas innecesarias: **7 votos (70.0%)**
* B) Tal vez, dependiendo del tiempo disponible: **2 votos (20.0%)**
* C) No, prefiero el proceso tradicional de llamar al mesero: **1 voto (10.0%)**
> **Interpretación y justificación técnica:** El **90.0%** se muestra dispuesto a adoptar la liberación digital de mesas y pago ágil (70% sí definitivo y 20% ocasional), justificando la agilización del flujo de mesas.

---

## 6. OPORTUNIDADES TÉCNICAS DE MEJORA IDENTIFICADAS
1. **Comandas y control de mesas en tiempo real:** Digitalizar la comunicación salón-barra para reducir tiempos de espera de 15 a menos de 5 minutos.
2. **Módulo Innovador de Analítica (Productos Más Vendidos):** Métricas periódicas para destacar los productos favoritos del público y optimizar compras a proveedores.
3. **Módulo Innovador de Mermas y Desperdicios:** Registro clasificado de pérdidas (vencimiento, error de preparación, daño) con cálculo de impacto económico para minimizar costos ocultos.
4. **Inventario sincronizado:** Bloqueo en tiempo real de artículos sin disponibilidad para evitar cancelaciones en mesa.
