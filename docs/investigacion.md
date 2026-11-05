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

## 5. INSTRUMENTO 3: ENCUESTA A CLIENTES DE CAFETERÍAS DE ESPECIALIDAD
* **Población objetivo:** Clientes y consumidores frecuentes de cafeterías de especialidad y temáticas.
* **Muestra:** 25 encuestados.
* **Propósito:** Evaluar la experiencia del cliente y respaldar las funcionalidades del sistema **Cat-fé** (gestión ágil de mesas, catálogo de más vendidos y cultura de cero desperdicio).

### Cuestionario, Respuestas y Tabulación de Resultados:

#### Pregunta 1: Al visitar una cafetería en horarios de alta concurrencia, ¿cómo califica habitualmente el tiempo de espera desde que pide su orden hasta que la recibe en la mesa?
* A) Rápido y sin contratiempos (menos de 5 minutos): **12% (3 personas)**
* B) Aceptable, pero con demoras evidentes en horas pico (10 a 15 minutos): **48% (12 personas)**
* C) Lento y con esperas excesivas (más de 15 minutos): **40% (10 personas)**
> **Justificación técnica:** El 88% de los comensales percibe demoras en horas pico, evidenciando la necesidad de comandas digitales en tiempo real con Cat-fé.

#### Pregunta 2: ¿Con qué frecuencia le ocurre que solicita un producto de la carta (un café especial, postre o ingrediente particular) y el mesero le informa minutos después que ya no está disponible?
* A) Con frecuencia o me ha sucedido al menos una vez: **72% (18 personas)**
* B) Rara vez: **20% (5 personas)**
* C) Nunca me ha pasado: **8% (2 personas)**
> **Justificación técnica:** Demuestra que la falta de sincronización de inventario en vivo perjudica la experiencia del cliente. Cat-fé bloqueará automáticamente artículos sin stock.

#### Pregunta 3: Al ordenar en una cafetería, ¿le resultaría útil contar con recomendaciones visibles o una sección destacada con los "Productos Más Populares / Más Vendidos" para facilitar su elección?
* A) Sí, me orienta para probar las especialidades más reconocidas y decidir más rápido: **84% (21 personas)**
* B) Me es indiferente: **16% (4 personas)**
* C) No, prefiero revisar todo el menú por mi cuenta: **0% (0 personas)**
> **Justificación técnica:** Respalda directamente la funcionalidad innovadora de **Análisis de Productos Más Vendidos** en Cat-fé.

#### Pregunta 4: ¿Qué tan importante considera que su cuenta o factura detalle de forma clara, automática y sin tachones cada consumo, bebida, adición o modificación solicitada?
* A) Muy importante, brinda total claridad y confianza en lo que pago: **92% (23 personas)**
* B) Poco importante mientras el valor total parezca razonable: **8% (2 personas)**
* C) No le doy importancia: **0% (0 personas)**
> **Justificación técnica:** Fundamenta el módulo de precuenta automatizada y facturación sin enmendaduras manuales.

#### Pregunta 5: Las cafeterías manejan insumos frescos (leches, frutas, repostería artesanal). ¿Qué opinión le merece que el local utilice un sistema digital para registrar y controlar el desperdicio de alimentos (mermas), impulsando la sostenibilidad?
* A) Excelente, demuestra responsabilidad ambiental, orden administrativo y compromiso con la frescura: **88% (22 personas)**
* B) Favorable, aunque para mí lo primordial es el precio final: **12% (3 personas)**
* C) No me parece relevante: **0% (0 personas)**
> **Justificación técnica:** Valida con contundencia la funcionalidad innovadora de **Control y Tipificación de Desperdicios / Mermas**, alineando el software con la sostenibilidad gastronómica.

#### Pregunta 6: Si al terminar su consumo pudiera consultar la cuenta de su mesa en un clic y pagar de inmediato sin filas en caja, ¿utilizaría esta opción?
* A) Sí, agilizaría mi salida y evitaría esperas innecesarias: **84% (21 personas)**
* B) Tal vez, dependiendo del tiempo disponible: **12% (3 personas)**
* C) No, prefiero el proceso tradicional de llamar al mesero: **4% (1 persona)**
> **Justificación técnica:** Valida la optimización del ciclo de rotación y liberación de mesas gestionado por Cat-fé.

---

## 6. OPORTUNIDADES TÉCNICAS DE MEJORA IDENTIFICADAS
1. **Comandas y control de mesas en tiempo real:** Digitalizar la comunicación salón-barra para reducir tiempos de espera de 15 a menos de 5 minutos.
2. **Módulo de Analítica (Productos Más Vendidos):** Métricas periódicas para destacar los productos favoritos del público y optimizar compras a proveedores.
3. **Módulo de Mermas y Desperdicios:** Registro clasificado de pérdidas (vencimiento, error de preparación, daño) con cálculo de impacto económico para minimizar costos ocultos.
4. **Inventario sincronizado:** Bloqueo en tiempo real de artículos sin disponibilidad para evitar cancelaciones en mesa.
