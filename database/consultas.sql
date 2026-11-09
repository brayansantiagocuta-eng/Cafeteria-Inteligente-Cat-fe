-- ============================================================================
-- PROYECTO: SISTEMA INTELIGENTE DE GESTIÓN "CAT-FÉ" (CAFETERÍA STAR-LIGHT)
-- SESIÓN 6: CONSULTAS SQL APLICADAS AL NEGOCIO
-- Incluye: SELECT, INSERT, UPDATE, DELETE, WHERE, ORDER BY, JOIN, COUNT, SUM, GROUP BY, HAVING
-- ============================================================================

USE catfe_db;

-- 1. INSERT: Registrar un nuevo producto de temporada en el catálogo
INSERT INTO producto (categoria_id, codigo, nombre, precio_venta, costo_unitario, stock, stock_minimo, unidad_medida, fecha_caducidad)
VALUES (1, 'CAF-004', 'Mocaccino Avellana Star-Light', 9800.00, 3400.00, 25, 5, 'TAZA', '2026-12-15');

-- 2. SELECT + WHERE + ORDER BY: Consultar productos disponibles ordenados de mayor a menor precio
SELECT codigo, nombre, precio_venta, stock, unidad_medida
FROM producto
WHERE stock > 0 AND activo = 1
ORDER BY precio_venta DESC;

-- 3. UPDATE + WHERE: Actualizar estado de una mesa a 'OCUPADA' al asignar comensales
UPDATE mesa
SET estado = 'OCUPADA'
WHERE numero = 1;

-- 4. DELETE + WHERE: Eliminar un registro de producto de prueba que nunca tuvo ventas
DELETE FROM producto
WHERE codigo = 'CAF-004';

-- 5. JOIN MÚLTIPLE: Comandas activas con número de mesa, nombre de mesero, productos y notas para barra
SELECT 
    p.id AS comanda_id,
    m.numero AS numero_mesa,
    u.nombre_completo AS mesero,
    pr.nombre AS producto,
    dp.cantidad,
    dp.notas_preparacion,
    p.estado AS estado_pedido,
    p.fecha_hora
FROM pedido p
INNER JOIN mesa m ON m.id = p.mesa_id
INNER JOIN usuario u ON u.id = p.usuario_id
INNER JOIN detalle_pedido dp ON dp.pedido_id = p.id
INNER JOIN producto pr ON pr.id = dp.producto_id
WHERE p.estado IN ('PENDIENTE', 'EN_PREPARACION')
ORDER BY p.fecha_hora ASC;

-- 6. INNOVACIÓN 1 (GROUP BY + SUM + COUNT + ORDER BY): Ranking de Productos Más Vendidos (Top Sellers)
SELECT 
    pr.codigo,
    pr.nombre AS producto,
    c.nombre AS categoria,
    SUM(dp.cantidad) AS total_unidades_vendidas,
    COUNT(DISTINCT dp.pedido_id) AS frecuencia_en_comandas,
    SUM(dp.subtotal) AS ingresos_generados,
    SUM(dp.cantidad * (pr.precio_venta - pr.costo_unitario)) AS utilidad_bruta
FROM detalle_pedido dp
INNER JOIN producto pr ON pr.id = dp.producto_id
INNER JOIN categoria c ON c.id = pr.categoria_id
INNER JOIN pedido p ON p.id = dp.pedido_id
WHERE p.estado != 'ANULADO'
GROUP BY pr.id, pr.codigo, pr.nombre, c.nombre
ORDER BY total_unidades_vendidas DESC, ingresos_generados DESC;

-- 7. INNOVACIÓN 2 (GROUP BY + SUM + COUNT): Reporte Financiero de Mermas y Desperdicios por Causal
SELECT 
    me.motivo AS causal_desperdicio,
    COUNT(me.id) AS total_eventos,
    SUM(me.cantidad) AS unidades_desechadas,
    SUM(me.perdida_total) AS impacto_economico_cop
FROM merma me
GROUP BY me.motivo
ORDER BY impacto_economico_cop DESC;

-- 8. HAVING: Identificar productos estrella que superan las 2 unidades vendidas en el período
SELECT 
    pr.nombre AS producto,
    SUM(dp.cantidad) AS unidades_vendidas,
    SUM(dp.subtotal) AS total_recaudado
FROM detalle_pedido dp
INNER JOIN producto pr ON pr.id = dp.producto_id
GROUP BY pr.id, pr.nombre
HAVING SUM(dp.cantidad) > 2
ORDER BY unidades_vendidas DESC;

-- 9. ALERTA PREVENTIVA DE CADUCIDAD (HU-12): Insumos que vencen en los próximos 3 días
SELECT 
    codigo,
    nombre,
    stock,
    unidad_medida,
    fecha_caducidad,
    DATEDIFF(fecha_caducidad, CURDATE()) AS dias_para_vencer
FROM producto
WHERE fecha_caducidad IS NOT NULL
  AND DATEDIFF(fecha_caducidad, CURDATE()) <= 3
ORDER BY fecha_caducidad ASC;
