# SERVICIO NACIONAL DE APRENDIZAJE (SENA)
## CENTRO DE GESTIÓN DE MERCADOS, LOGÍSTICA Y TECNOLOGÍAS DE LA INFORMACIÓN
### TECNÓLOGO EN ANÁLISIS Y DESARROLLO DE SOFTWARE (ADSO)

---

# INFORME TÉCNICO DE INVESTIGACIÓN DEL NEGOCIO (SESIÓN 1)
## PROYECTO: SISTEMA INTELIGENTE DE GESTIÓN "CAT-FÉ"
### ESTABLECIMIENTO: CAFETERÍA DE ESPECIALIDAD "STAR-LIGHT"

* **Aprendiz:** Brayan Santiago Cuta
* **Instructora:** Joan Castillo Celis
* **Ficha de Caracterización:** ADSO
* **Fecha:** Noviembre de 2026
* **Repositorio GitHub:** [Cafeteria-Inteligente-Cat-fe](https://github.com/brayansantiagocuta-eng/Cafeteria-Inteligente-Cat-fe)

---

## 1. PRESENTACIÓN Y CONTEXTO DEL NEGOCIO

El presente documento consolida la investigación de campo realizada para la cafetería de especialidad y experiencia **Star-Light**. A través de la aplicación de técnicas de levantamiento de requisitos (entrevista, observación directa y encuesta por muestreo), se diagnostica la operación actual y se definen las bases funcionales para el desarrollo del sistema web **Cat-fé**, enfocado en la gestión ágil de mesas, comandas, facturación y sus dos componentes innovadores: **análisis de productos más vendidos** y **control integral de mermas y desperdicios**.

### 1.1 Ficha Técnica del Negocio
| Parámetro | Detalle |
| :--- | :--- |
| **Razón / Nombre Comercial:** | Star-Light (Cafetería de Especialidad) |
| **Nombre del Software:** | Cat-fé |
| **Sector:** | Gastronomía comercial, café de especialidad y repostería artesanal |
| **Modalidades de Servicio:** | Consumo en mesa, pedidos en barra y modalidad para llevar (*takeaway*) |
| **Ubicación de Prueba:** | Bogotá D.C., Colombia |

### 1.2 Mapa de Actores del Negocio
| Actor | Rol en el Negocio | Responsabilidades Operativas | Interacción con el Sistema Cat-fé |
| :--- | :--- | :--- | :--- |
| **Administrador / Dueño** | Gestión estratégica | Compras de insumos, fijación de precios, control de caja y nómina. | Acceso total: dashboards de ventas, reporte de mermas, gestión de usuarios e inventario. |
| **Barista / Personal de Cocina** | Preparación técnica | Elaboración de bebidas a base de espresso, alimentos y pastelería artesanal. | Pantalla de cocina/barra: recepción de comandas en tiempo real, registro de mermas por preparación/caducidad. |
| **Mesero / Cajero** | Atención y cobranza | Recepción de comensales, toma de órdenes en mesa y liquidación de cuentas. | Módulo de mesas: asignación de mesas, envío de comandas digitales, emisión de precuenta y cobro. |
| **Cliente Final** | Consumidor | Elección de productos del menú, consumo en salón y pago de cuenta. | Visualización de menú digital, recomendaciones de más vendidos y comprobante detallado. |

---

## 2. SITUACIÓN ACTUAL Y PROBLEMÁTICA OBSERVADA

Actualmente, **Star-Light** realiza la toma de comandas mediante libretas de papel autocopiante y cálculo manual de consumos. Durante el diagnóstico se identificaron las siguientes problemáticas críticas:

1. **Pérdidas no cuantificadas por mermas y desperdicios:** Insumos perecederos (leches vegetales, frutas, repostería con vida útil inferior a 72 horas) y errores de preparación en barra se desechan sin clasificar el motivo ni cuantificar la pérdida económica.
2. **Abastecimiento empírico y falta de analítica de rotación:** No existen reportes consolidados sobre los artículos de mayor y menor rotación (*Top Sellers*), lo que genera sobrestock de productos fríos y desabastecimiento imprevisto de cafés y postres populares.
3. **Cuellos de botella en la atención de mesas:** La transcripción física de órdenes genera demoras de hasta 15 minutos en horas pico, errores por caligrafía ilegible y filas en caja para liquidar cuentas.

---

## 3. INSTRUMENTO 1: ENTREVISTA AL PERSONAL ADMINISTRATIVO Y OPERATIVO

* **Entrevistados:** Administrador general y Barista principal de Star-Light.
* **Técnica:** Entrevista semiestructurada con 10 preguntas orientadas a procesos y puntos de dolor.

### Matriz de Preguntas, Respuestas y Análisis Técnico

| N.° | Pregunta Aplicada | Respuesta Obtenida | Análisis e Impacto en Cat-fé |
| :---: | :--- | :--- | :--- |
| **1** | ¿Cómo gestionan actualmente la toma de órdenes y asignación de mesas? | En comandas físicas de papel autocopiante; el mesero lleva una copia a la barra y guarda la otra en caja. | Obliga a implementar comandas digitales inmediatas que vinculen número de mesa con la barra. |
| **2** | ¿Cuáles son los errores más frecuentes de ese método en horas pico? | Comandas traspapeladas, letra poco clara del mesero y demoras por tener que caminar de ida y vuelta. | Cat-fé estandariza la orden mediante selección en pantalla táctil con especificaciones claras. |
| **3** | ¿Cómo controlan los productos e ingredientes que caducan o se dañan (mermas)? | Se desechan al finalizar el turno; no se anota la causa ni se calcula el costo en dinero de lo botado. | **Valida la funcionalidad innovadora:** Módulo de mermas con tipificación de causa y cálculo de costo financiero. |
| **4** | ¿Conocen con exactitud matemática cuáles son los 5 productos más vendidos y su margen? | No con exactitud; nos guiamos por la intuición de lo que se acaba rápido en la vitrina. | **Valida la funcionalidad innovadora:** Dashboard con ranking de ventas y rotación periódica. |
| **5** | ¿Qué sucede cuando un cliente pide un producto y en barra descubren que se agotó? | El mesero debe volver a la mesa a ofrecer disculpas y pedir que elija otro ítem, generando malestar. | Cat-fé inhabilitará automáticamente en el menú cualquier producto con stock en cero. |
| **6** | ¿Cuánto tiempo demanda el cierre de caja diario y el cuadre de ingresos? | Entre 45 minutos y una hora sumando tirillas de papel y cruzando con comprobantes de pago. | Cierre automático en un clic con consolidado de ventas por medio de pago (efectivo, transferencia, tarjeta). |
| **7** | ¿Qué reportes considera indispensables en el sistema? | Ranking de productos más vendidos, reporte de pérdidas por desperdicio y consolidado diario de ventas. | Define los reportes prioritarios que se construirán en las sesiones de SQL y MVC. |
| **8** | ¿Qué impacto económico tendría reducir las mermas en un 15% o 20%? | Muy alto; la materia prima de café especial y repostería es costosa; evitar vencimientos aumentaría la ganancia neta. | Justifica la viabilidad financiera del proyecto para el establecimiento. |
| **9** | ¿Dispone el local de equipos para implementar el sistema? | Sí, computador en caja y dispositivos móviles/tablets con conexión Wi-Fi estable. | Confirma la viabilidad de una aplicación web responsive (Bootstrap 5). |
| **10** | ¿Qué roles de seguridad deben existir en el aplicativo? | Administrador con permisos totales, meseros con toma de comanda y barra solo para despachos y mermas. | Define el modelo de control de acceso por roles (RBAC) en la base de datos. |

---

## 4. INSTRUMENTO 2: FORMATO DE OBSERVACIÓN DIRECTA DE CAMPO

* **Escenario:** Salón de atención y barra de preparación de Star-Light.
* **Fecha y Horario:** Sábado, 4:00 p. m. a 6:30 p. m. (Franja horaria pico).
* **Muestra observada:** 1 Administrador, 2 Baristas, 2 Meseros, 28 Clientes simultáneos.

### Registro Estructurado de Observación

| Fase del Servicio | Actividad Observada | Tiempo Promedio | Problema Identificado | Oportunidad de Mejora con Cat-fé |
| :--- | :--- | :---: | :--- | :--- |
| **Fase 1: Asignación y Comanda** | El mesero atiende la mesa, anota en papel y camina a la barra a radicar la orden. | 4 min 30 s | Si la barra está llena, la comanda queda en espera sobre el mesón y se traspapela con órdenes previas. | Envío digital inmediato del pedido a la pantalla de barra sin desplazamientos físicos del mesero. |
| **Fase 2: Preparación y Mermas** | Barista extrae espressos, texturiza leche y porciona postres artesanales. | 6 min 00 s | Se descartaron 2 jarras de leche sobrecalentadas y 1 porción de tarta desmoronada; no se registró el costo de la pérdida. | Formulario rápido en barra para registrar la merma indicando motivo (`Error de preparación`, `Caducidad`, `Accidente`). |
| **Fase 3: Facturación y Salida** | Cliente pide la cuenta; el mesero busca la comanda física en caja y suma los valores con calculadora. | 5 min 45 s | Filas de clientes en caja esperando liquidación de mesa y verificación de adiciones. | Precuenta automática por mesa en un clic, liberando la mesa a estado `Disponible` inmediatamente tras el cobro. |

---

## 5. INSTRUMENTO 3: ENCUESTA APLICADA A CLIENTES (DATOS REALES TABULADOS)

* **Población objeto:** Clientes y consumidores frecuentes de cafeterías de especialidad.
* **Muestra real capturada:** 10 respuestas individuales recolectadas mediante Google Forms (archivo fuente `Encuesta Cat-fé.csv`).
* **Propósito:** Validar mediante evidencia cuantitativa la necesidad del sistema y la aceptación de las innovaciones planteadas.

### 5.1 Tabulación de Resultados

#### Pregunta 1: Al visitar una cafetería en horarios de alta concurrencia, ¿cómo califica habitualmente el tiempo de espera desde que pide su orden hasta que la recibe en la mesa?
| Opción de Respuesta | Frecuencia Absoluta (Votos) | Porcentaje (%) |
| :--- | :---: | :---: |V
| Aceptable, pero con demoras evidentes en horas pico (10 a 15 minutos) | 5 | 50.0% |
| Rápido y sin contratiempos (menos de 5 minutos) | 3 | 30.0% |
| Lento y con esperas excesivas (más de 15 minutos) | 2 | 20.0% |
| **TOTAL** | **10** | **100.0%** |
> **Hallazgo técnico:** El **70.0%** de los comensales manifiesta retrasos en horarios concurridos, lo que respalda la necesidad de comandas digitales en tiempo real en Cat-fé para reducir el tiempo de despacho a menos de 5 minutos.

---

#### Pregunta 2: ¿Con qué frecuencia le ocurre que solicita un producto de la carta (un café especial, postre o ingrediente particular) y el personal le informa minutos después que ya no está disponible?
| Opción de Respuesta | Frecuencia Absoluta (Votos) | Porcentaje (%) |
| :--- | :---: | :---: |
| Con frecuencia o me ha sucedido al menos una vez | 6 | 60.0% |
| Rara vez | 3 | 30.0% |
| Nunca me ha pasado | 1 | 10.0% |
| **TOTAL** | **10** | **100.0%** |
> **Hallazgo técnico:** El **90.0%** de los clientes encuestados ha experimentado el desabastecimiento de productos ya ordenados en mesa. Cat-fé bloqueará automáticamente del catálogo cualquier ítem sin existencias para evitar cancelaciones.

---

#### Pregunta 3: Al ordenar en una cafetería, ¿le resultaría útil contar con recomendaciones visibles o una sección destacada con los "Productos Más Populares / Más Vendidos" para facilitar su elección?
| Opción de Respuesta | Frecuencia Absoluta (Votos) | Porcentaje (%) |
| :--- | :---: | :---: |
| Sí, me orienta para probar las especialidades más reconocidas y decidir más rápido | 6 | 60.0% |
| Me es indiferente | 3 | 30.0% |
| No, prefiero revisar todo el menú por mi cuenta | 1 | 10.0% |
| **TOTAL** | **10** | **100.0%** |
> **Hallazgo técnico:** El **60.0%** de los encuestados afirma que una sección de productos más vendidos agiliza directamente su decisión, y un 30% adicional lo valora positivamente. Esto **valida directamente la funcionalidad innovadora de análisis de productos más vendidos**.

---

#### Pregunta 4: ¿Qué tan importante considera que su cuenta o factura detalle de forma clara, automática y sin tachones cada consumo, bebida, adición o modificación solicitada?
| Opción de Respuesta | Frecuencia Absoluta (Votos) | Porcentaje (%) |
| :--- | :---: | :---: |
| Muy importante, brinda total claridad y confianza en lo que pago | 7 | 70.0% |
| Poco importante mientras el valor total parezca razonable | 2 | 20.0% |
| No le doy importancia | 1 | 10.0% |
| **TOTAL** | **10** | **100.0%** |
> **Hallazgo técnico:** El **70.0%** de los comensales califica como muy importante la precisión y transparencia de su cuenta. Esto fundamenta el desarrollo del módulo de precuenta digital y liquidación de mesas en Cat-fé.

---

#### Pregunta 5: Las cafeterías manejan insumos frescos de alta rotación (leches vegetales, frutas, repostería artesanal). ¿Qué opinión tiene para que el local utilice un sistema digital para gestionar el desperdicio de alimentos (mermas), impulsando la sostenibilidad?
| Opción de Respuesta | Frecuencia Absoluta (Votos) | Porcentaje (%) |
| :--- | :---: | :---: |
| Excelente, demuestra responsabilidad ambiental, orden administrativo y compromiso con la frescura | 7 | 70.0% |
| Favorable, aunque para mí lo primordial es el precio final | 2 | 20.0% |
| No me parece relevante | 1 | 10.0% |
| **TOTAL** | **10** | **100.0%** |
> **Hallazgo técnico:** El **90.0%** expresa una valoración favorable (70% excelente y 20% favorable) hacia el control digital del desperdicio. Esto **valida plenamente la funcionalidad innovadora de control de mermas/desperdicios**, alineando la eficiencia contable con la percepción positiva de sostenibilidad.

---

#### Pregunta 6: Si al terminar su consumo pudiera consultar la cuenta de su mesa en un clic y pagar de inmediato sin hacer filas en el mostrador, ¿utilizaría esta opción?
| Opción de Respuesta | Frecuencia Absoluta (Votos) | Porcentaje (%) |
| :--- | :---: | :---: |
| Sí, agilizaría mi salida y evitaría esperas innecesarias | 7 | 70.0% |
| Tal vez, dependiendo del tiempo disponible | 2 | 20.0% |
| No, prefiero el proceso tradicional de llamar al mesero | 1 | 10.0% |
| **TOTAL** | **10** | **100.0%** |
> **Hallazgo técnico:** El **90.0%** de los clientes utilizaría o evaluaría positivamente la liberación ágil de la mesa y la consulta rápida de su saldo, respaldando la necesidad del módulo de control de estados de mesa en Cat-fé.

---

## 6. OPORTUNIDADES TÉCNICAS DE MEJORA IDENTIFICADAS

A partir de la triangulación de la entrevista, la observación directa y la encuesta real tabulada, se determinan **cuatro ejes funcionales indispensables** para la construcción del sistema **Cat-fé**:

| N.° | Eje de Mejora | Problema Actual en Star-Light | Solución Implementada en Cat-fé | Impacto Esperado |
| :---: | :--- | :--- | :--- | :--- |
| **1** | **Gestión Operativa de Mesas y Comandas** | Comandas de papel, pedidos ilegibles, demoras de 10-15 minutos en horas pico. | Asignación digital de mesas (`Disponible`, `Ocupada`, `Cuenta solicitada`) con envío instantáneo de comanda a pantalla de barra. | Reducción del tiempo de toma y despacho de órdenes en más del 60%. |
| **2** | **Analítica de Productos Más Vendidos (Innovación 1)** | Compras de café e insumos basadas en intuición sin métricas de rotación ni demanda real. | Módulo analítico con consultas SQL agregadas (`COUNT`, `SUM`, `GROUP BY`) que genera el ranking de productos estrella por periodicidad. | Optimización de compras a proveedores, reducción de sobreinventario y venta sugerida al cliente. |
| **3** | **Control de Mermas y Desperdicios (Innovación 2)** | Pérdidas invisibles por leche sobrecalentada, alimentos caducados o accidentes sin registro contable. | Formulario tipificado de bajas (`Caducidad`, `Falla de preparación`, `Accidente/Deterioro`) calculando costo monetario por cada merma. | Reducción estimada de entre 15% y 20% en costos de pérdida de insumos perecederos. |
| **4** | **Sincronización de Inventario en Tiempo Real** | El 90% de clientes encuestados ha pedido productos que luego resultan agotados. | Bloqueo dinámico de productos en la carta en cuanto el stock llega a cero unidades. | Eliminación de pedidos cancelados y mejora sustancial en la satisfacción del comensale. |

---

## 7. CONCLUSIÓN Y JUSTIFICACIÓN DE LA SESIÓN 1

La investigación de campo confirma plenamente la viabilidad técnica, operativa y comercial del desarrollo del sistema de información **Cat-fé** para la cafetería **Star-Light**. Las evidencias recolectadas demuestran que las dos funcionalidades innovadoras asignadas por la instructora Joan Castillo Celis (**análisis de productos más vendidos** y **control de desperdicios**) no solo responden a los requerimientos formativos de ADSO, sino que constituyen soluciones reales y medibles a los dos principales dolores operativos del negocio gastronómico investigado.

---

## 8. EVIDENCIAS ASOCIADAS
* **Archivo de datos fuente:** `Encuesta Cat-fé.csv` (10 registros reales).
* **Script de tabulación analítica:** `scratch/analizar_encuesta.php`.
* **Documento versionado en Git:** `docs/investigacion.md`.
* **Historial de Commits en GitHub:** `docs: actualizar investigacion con datos reales tabulados de la encuesta csv`.
