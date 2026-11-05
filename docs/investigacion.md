# SESIÓN 1: INVESTIGACIÓN DEL NEGOCIO
## PROYECTO: CAFETERÍA INTELIGENTE "CAT-FÉ"
**Tecnólogo en Análisis y Desarrollo de Software (ADSO) - SENA**  
**Aprendiz:** Brayan Santiago Cuta  
**Instructora:** Joan Castillo Celis  
**Fecha:** Noviembre de 2026  

---

## 1. DESCRIPCIÓN DEL NEGOCIO INVESTIGADO
* **Nombre comercial:** Cat-fé (Cafetería Temática)
* **Sector:** Gastronomía y servicios temáticos de recreación / bienestar felino.
* **Modelo operativo:** Servicio a la mesa, barra y pedidos para llevar en un entorno donde conviven clientes y gatos rescatados en proceso de adopción.
* **Actores principales del negocio:**
  1. **Administrador / Dueño:** Responsable de abastecimiento de insumos, fijación de precios, supervisión de personal y análisis de costos/utilidades.
  2. **Barista / Personal de Cocina:** Prepara bebidas y alimentos, controla existencias de ingredientes inmediatos y detecta insumos vencidos o mermas por preparación.
  3. **Mesero / Cajero:** Atiende comensales, toma órdenes en mesa, genera cobros e informa disponibilidad de productos.
  4. **Cliente final:** Consume productos, interactúa con el espacio y requiere agilidad en la atención y precisión en su cuenta.

---

## 2. SITUACIÓN ACTUAL Y PROBLEMÁTICA OBSERVADA
Actualmente, el establecimiento gestiona los pedidos mediante libretas físicas (comandas manuales) y una caja registradora convencional. Este método manual presenta las siguientes fallas críticas:
1. **Pérdida de inventario y mermas invisibles:** No se cuantifica el producto descartado por fecha de caducidad (leche vegetal, pasteles artesanales frescos) ni los desperdicios ocurridos durante la preparación en barra.
2. **Cálculo impreciso de la demanda:** Las compras semanales a proveedores se realizan de forma empírica o intuitiva, provocando sobrestock de productos de baja rotación y desabastecimiento de los productos más vendidos (top sellers).
3. **Falta de visibilidad de mesas en tiempo real:** Retrasos al verificar si una mesa ya fue atendida, si la cuenta fue liquidada o si está disponible para nuevos clientes.

---

## 3. INSTRUMENTO 1: ENTREVISTA APLICADA AL ADMINISTRADOR Y EQUIPO
* **Entrevistado:** Gerente operativo y Administrador de cafetería temática.
* **Objetivo:** Identificar los cuellos de botella en la toma de pedidos, gestión de mermas e inventario.

### Preguntas y Respuestas Tabuladas:
1. **¿Cómo registra actualmente las órdenes y el estado de las mesas?**  
   * *Respuesta:* En comandas de papel autocopiante. El mesero lleva la copia a la barra de café y la original queda en caja para la cuenta final.
2. **¿Qué errores o inconvenientes se presentan con mayor frecuencia en ese proceso?**  
   * *Respuesta:* Letra ilegible, pedidos duplicados, demoras cuando hay salón lleno y extravío de comandas al momento de cobrar.
3. **¿Cómo controlan actualmente los productos e insumos que se vencen o se dañan (mermas/desperdicios)?**  
   * *Respuesta:* Se revisan a ojo al final del turno y se tiran a la basura sin registrar la causa exacta ni el valor monetario perdido.
4. **¿Saben con exactitud matemática cuáles son los 5 productos que dejan mayor ganancia y mayor rotación cada mes?**  
   * *Respuesta:* No con exactitud; nos guiamos por la intuición de lo que más pide la gente, pero no tenemos métricas concretas ni gráficas por franjas horarias.
5. **¿Qué ocurre cuando un cliente solicita un producto que se agotó durante el turno?**  
   * *Respuesta:* El mesero debe ir hasta la barra a preguntar, interrumpiendo al barista y generando una mala experiencia para el cliente.
6. **¿Cuánto tiempo promedio toma generar el cierre de caja diario y el balance de ventas?**  
   * *Respuesta:* Entre 45 minutos y 1 hora, sumando tirillas y cuadrando efectivo manualmente.
7. **¿Qué informes o reportes considera indispensables para tomar mejores decisiones en Cat-fé?**  
   * *Respuesta:* Un ranking de productos más y menos vendidos, un reporte de pérdidas por desperdicio y un consolidado diario de ventas por medio de pago.
8. **¿Qué impacto tendría para el negocio reducir el desperdicio de insumos en un 15% o 20%?**  
   * *Respuesta:* Significativo. La repostería artesanal tiene vida útil corta de 48 a 72 horas; si controlamos el lote y la merma, el margen neto aumentaría notablemente.
9. **¿El personal cuenta con dispositivos (móvil, tablet o PC) disponibles para registrar información durante el servicio?**  
   * *Respuesta:* Sí, contamos con una tablet en mostrador/caja y el personal puede acceder desde terminales ligeras conectadas a la red local.
10. **¿Qué requisitos de seguridad o roles considera necesarios en el sistema?**  
    * *Respuesta:* Que solo el administrador pueda editar precios, borrar ventas o dar de baja desperdicios costosos; los meseros solo deben tomar pedidos y consultar disponibilidad.

---

## 4. INSTRUMENTO 2: FORMATO DE OBSERVACIÓN DIRECTA DE CAMPO

| Criterio | Registro de Campo |
| :--- | :--- |
| **Fecha y Horario:** | Sábado, 4:00 p. m. a 6:30 p. m. (Hora pico) |
| **Lugar:** | Salón principal y barra de preparación de bebidas de Cat-fé |
| **Actores observados:** | 1 Administrador, 2 Baristas/Cocineros, 2 Meseros, 28 Clientes |
| **Actividad 1: Toma de comandas** | **Problema detectado:** El mesero tarda 4 minutos anotando a mano y luego 2 minutos desplazándose hasta la barra.  <br>**Oportunidad:** Pedidos digitales inmediatos por número de mesa que se reflejen al instante en pantalla de barra. |
| **Actividad 2: Preparación y mermas** | **Problema detectado:** Se descartaron 3 vasos de café por preparación errónea y una porción de cheesecake por desmoronamiento; ninguno fue anotado. <br>**Oportunidad:** Módulo de registro rápido de merma (motivo: error barista, caída, producto vencido). |
| **Actividad 3: Cobro y cierre** | **Problema detectado:** Se generó fila en caja de 3 mesas simultáneas esperando cálculo manual de la cuenta y validación de consumos. <br>**Oportunidad:** Precuenta automática por mesa en un solo clic con desglose de ítems e impuestos. |

---

## 5. INSTRUMENTO 3: ENCUESTA APLICADA A CLIENTES Y USUARIOS
* **Muestra aplicada:** 25 clientes del establecimiento.
* **Herramienta:** Formulario corto con preguntas cerradas de escala y opción múltiple.

### Resultados Consolidados:
1. **¿Qué tan ágil considera el tiempo de toma de pedido y entrega de su cuenta?**
   * Muy rápido: 12%
   * Aceptable: 44%
   * Lento / Con demoras: 44%
2. **¿Le ha ocurrido que pide un producto de la carta y luego le informan que ya no hay disponibilidad?**
   * Sí, frecuentemente o al menos una vez: 68%
   * No, siempre hubo disponibilidad: 32%
3. **¿Le gustaría visualizar un menú digital interactivo y recibir su cuenta de forma clara y detallada?**
   * Totalmente de acuerdo: 92%
   * Indiferente: 8%
4. **¿Considera valioso que la cafetería reduzca el desperdicio de comida mediante políticas sostenibles y tecnológicas?**
   * Muy importante: 88%
   * Poco importante: 12%

---

## 6. ANÁLISIS DE RESULTADOS Y OPORTUNIDADES DE MEJORA IDENTIFICADAS
A partir de la triangulación de la entrevista, la observación y la encuesta, se establecen **4 oportunidades técnicas de mejora** que justifican el desarrollo del sistema **Cat-fé**:

1. **Automatización del flujo Mesa-Comanda-Caja:**  
   Eliminar el papel mediante un control de estados de mesa (`Disponible`, `Ocupada`, `Por cobrar`) y pedidos con actualización inmediata.
2. **Módulo de Analítica: Productos más vendidos (Top Sellers):**  
   Generar consultas y dashboards que muestren el volumen de ventas por categoría y producto para planear compras inteligentes y promociones en horas de baja demanda.
3. **Módulo Innovador de Control de Desperdicios (Mermas):**  
   Implementar un catálogo tipificado de causas de pérdida (`Caducidad`, `Error de preparación`, `Accidente/Deterioro`) que calcule el costo financiero de cada merma, permitiendo tomar medidas correctivas en cocina y barra.
4. **Inventario en tiempo real con alertas de stock mínimo:**  
   Evitar que los meseros ofrezcan productos agotados, actualizando el catálogo automáticamente con cada orden confirmada.

---

## 7. EVIDENCIAS DE LA SESIÓN 1
* **Instrumentos construidos:** Entrevista (10 preguntas abiertas), matriz de observación (3 momentos críticos) y encuesta estructurada.
* **Documentación técnica:** Almacenada en formato markdown en `docs/investigacion.md` para control de versiones en Git.
* **Commit asociado:** `docs: agregar investigacion del negocio y levantamiento de campo`.
