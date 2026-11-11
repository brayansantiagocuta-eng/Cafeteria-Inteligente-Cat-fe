-- ============================================================================
-- SERVICIO NACIONAL DE APRENDIZAJE (SENA)
-- TECNÓLOGO EN ANÁLISIS Y DESARROLLO DE SOFTWARE (ADSO)
-- APRENDIZ: Brayan Santiago Cuta | INSTRUCTORA: Joan Castillo Celis
-- PROYECTO: SISTEMA INTELIGENTE DE GESTIÓN "CAT-FÉ"
-- ESTABLECIMIENTO: CAFETERÍA DE ESPECIALIDAD "STAR-LIGHT"
-- SESIÓN 6: SQL APLICADO A TU NEGOCIO (DML Y CONSULTAS AVANZADAS)
-- 
-- COMPROBACIÓN DE PALABRAS CLAVE REQUERIDAS (11 DE 11):
-- 1. SELECT   2. INSERT   3. UPDATE   4. DELETE   5. WHERE
-- 6. ORDER BY 7. JOIN     8. COUNT    9. SUM      10. GROUP BY   11. HAVING
-- ============================================================================

USE catfe_db;

-- ----------------------------------------------------------------------------
-- 1. INSERT (Crear): Registrar un nuevo producto de temporada en el catálogo
-- Propósito: Permite al Administrador ingresar nuevos cafés o postres de edición especial.
-- ----------------------------------------------------------------------------
INSERT INTO producto (categoria_id, codigo, nombre, precio_venta, costo_unitario, stock, stock_minimo, unidad_medida, fecha_caducidad, activo)
VALUES (1, 'CAF-004', 'Mocaccino Avellana Star-Light', 9800.00, 3400.00, 25, 5, 'TAZA', '2026-12-15', 1);

-- ----------------------------------------------------------------------------
-- 2. SELECT + WHERE + ORDER BY (Consultar con filtro y orden)
-- Propósito: Listar en el menú digital los productos activos con stock disponible,
-- ordenados de mayor a menor precio para facilitar la venta sugerida.
-- ----------------------------------------------------------------------------
SELECT 
    p.codigo, 
    p.nombre, 
    p.precio_venta, 
    p.stock, 
    p.unidad_medida,
    c.nombre AS categoria
FROM producto p
INNER JOIN categoria c ON c.id = p.categoria_id
WHERE p.stock > 0 AND p.activo = 1
ORDER BY p.precio_venta DESC;

-- ----------------------------------------------------------------------------
-- 3. UPDATE + WHERE (Actualizar)
-- Propósito: Modificar el estado físico de una mesa a 'OCUPADA' cuando el mesero
-- sienta comensales en el salón y asigna la comanda inicial (RN-02).
-- Nota de seguridad: Siempre incluye la cláusula WHERE para evitar alterar todo el salón.
-- ----------------------------------------------------------------------------
UPDATE mesa 
SET estado = 'OCUPADA' 
WHERE numero = 1;

-- ----------------------------------------------------------------------------
-- 4. DELETE + WHERE (Eliminar)
-- Propósito: Eliminar del catálogo un producto de prueba temporal que no haya
-- tenido comandas ni registros contables asociados (Integridad Referencial).
-- Nota de seguridad: Siempre incluye la cláusula WHERE.
-- ----------------------------------------------------------------------------
DELETE FROM producto 
WHERE codigo = 'CAF-004';

-- ----------------------------------------------------------------------------
-- 5. JOIN MÚLTIPLE (Relacionar tablas maestras y transaccionales)
-- Propósito: Pantalla de despacho para Barra/Cocina (RF-05). Visualiza las comandas
-- activas con su número de mesa, nombre del mesero que tomó la orden, productos,
-- cantidad, notas especiales (alérgenos, leches vegetales) y hora de llegada.
-- ----------------------------------------------------------------------------
SELECT 
    p.id AS comanda_id,
    m.numero AS mesa,
    u.nombre_completo AS mesero,
    pr.nombre AS producto,
    dp.cantidad,
    dp.notas_preparacion,
    p.estado AS estado_comanda,
    p.fecha_hora
FROM pedido p
JOIN mesa m ON m.id = p.mesa_id
JOIN usuario u ON u.id = p.usuario_id
JOIN detalle_pedido dp ON dp.pedido_id = p.id
JOIN producto pr ON pr.id = dp.producto_id
WHERE p.estado IN ('PENDIENTE', 'EN_PREPARACION')
ORDER BY p.fecha_hora ASC;

-- ----------------------------------------------------------------------------
-- 6. AGREGACIÓN (GROUP BY + SUM + COUNT + ORDER BY): MÓDULO INNOVADOR 1
-- Propósito: Ranking de Productos Más Vendidos ("Top Vendidos" - RF-10).
-- Consolida unidades totales despachadas, frecuencia de pedidos, facturación bruta
-- y margen de utilidad neta para orientar compras a proveedores.
-- ----------------------------------------------------------------------------
SELECT 
    pr.codigo,
    pr.nombre AS producto,
    c.nombre AS categoria,
    SUM(dp.cantidad) AS total_unidades_vendidas,
    COUNT(DISTINCT dp.pedido_id) AS veces_ordenado,
    SUM(dp.subtotal) AS ingresos_totales_cop,
    SUM(dp.cantidad * (pr.precio_venta - pr.costo_unitario)) AS utilidad_bruta_cop
FROM detalle_pedido dp
JOIN producto pr ON pr.id = dp.producto_id
JOIN categoria c ON c.id = pr.categoria_id
JOIN pedido p ON p.id = dp.pedido_id
WHERE p.estado != 'ANULADO'
GROUP BY pr.id, pr.codigo, pr.nombre, c.nombre
ORDER BY total_unidades_vendidas DESC, ingresos_totales_cop DESC;

-- ----------------------------------------------------------------------------
-- 7. AGREGACIÓN FINANCIERA (GROUP BY + SUM + COUNT): MÓDULO INNOVADOR 2
-- Propósito: Reporte de Costo y Desperdicio de Insumos / Mermas (RF-11, RF-12, RN-03).
-- Cuantifica el impacto financiero en pesos ($ COP) de los insumos desechados,
-- clasificándolos por la causal de pérdida (Caducidad FEFO, Mala preparación o Accidente).
-- ----------------------------------------------------------------------------
SELECT 
    me.motivo AS causal_desperdicio,
    COUNT(me.id) AS cantidad_incidentes,
    SUM(me.cantidad) AS total_unidades_desechadas,
    SUM(me.perdida_total) AS costo_financiero_perdida_cop
FROM merma me
GROUP BY me.motivo
ORDER BY costo_financiero_perdida_cop DESC;

-- ----------------------------------------------------------------------------
-- 8. FILTRADO AGREGADO (HAVING + GROUP BY + SUM)
-- Propósito: Detectar productos "Estrella" de alta rotación que superan un umbral
-- estricto de ventas acumuladas (más de 2 unidades en el período) para campañas de fidelización.
-- ----------------------------------------------------------------------------
SELECT 
    pr.nombre AS producto,
    SUM(dp.cantidad) AS unidades_vendidas,
    SUM(dp.subtotal) AS total_recaudado
FROM detalle_pedido dp
JOIN producto pr ON pr.id = dp.producto_id
GROUP BY pr.id, pr.nombre
HAVING SUM(dp.cantidad) > 2
ORDER BY unidades_vendidas DESC;

-- ----------------------------------------------------------------------------
-- 9. CONTROL PREVENTIVO DE FEFO (DATEDIFF + WHERE + ORDER BY)
-- Propósito: Alerta de caducidad temprana de insumos perecederos (HU-12).
-- Identifica ingredientes con fecha de vencimiento menor o igual a 3 días.
-- ----------------------------------------------------------------------------
SELECT 
    codigo,
    nombre,
    stock,
    unidad_medida,
    fecha_caducidad,
    DATEDIFF(fecha_caducidad, CURDATE()) AS dias_restantes
FROM producto
WHERE fecha_caducidad IS NOT NULL
  AND DATEDIFF(fecha_caducidad, CURDATE()) <= 3
ORDER BY fecha_caducidad ASC;
