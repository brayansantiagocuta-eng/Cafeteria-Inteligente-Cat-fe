-- PROYECTO: SISTEMA INTELIGENTE DE GESTIÓN "CAT-FÉ" (CAFETERÍA STAR-LIGHT)

USE catfe_db;

-- 1. Roles del sistema
INSERT INTO rol (nombre, descripcion) VALUES
('ADMINISTRADOR', 'Control total del sistema, reportes financieros, catálogo y mermas'),
('MESERO', 'Atención de salón, toma de comandas y generación de precuentas'),
('BARISTA', 'Recepción de comandas en barra, despacho y registro de mermas operativas');

-- 2. Usuarios (5 registros de prueba con hash BCRYPT simulado de 'Catfe2026*')
INSERT INTO usuario (rol_id, nombre_completo, correo, password_hash) VALUES
(1, 'Brayan Santiago Cuta', 'admin@starlight-catfe.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(2, 'Laura Valentina Gómez', 'laura.mesera@starlight-catfe.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(2, 'Carlos Andrés Rojas', 'carlos.mesero@starlight-catfe.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(3, 'Sofía Martínez Barista', 'sofia.barra@starlight-catfe.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(3, 'Mateo Herrera Cocina', 'mateo.cocina@starlight-catfe.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- 3. Categorías gastronómicas (5 registros)
INSERT INTO categoria (nombre, descripcion) VALUES
('Cafés de Especialidad', 'Bebidas calientes a base de grano selecto colombiano'),
('Bebidas Frías & Frappés', 'Infusiones heladas, matcha y frappés artesanales'),
('Repostería Artesanal', 'Postres horneados frescos con vida útil controlada'),
('Snacks Salados', 'Croissants, quiches y sándwiches gourmet'),
('Insumos & Leches Vegetales', 'Adiciones y materias primas perecederas de barra');

-- 4. Productos (8 registros con stock y fechas de caducidad para alertas HU-12)
INSERT INTO producto (categoria_id, codigo, nombre, precio_venta, costo_unitario, stock, stock_minimo, unidad_medida, fecha_caducidad) VALUES
(1, 'CAF-001', 'Capuchino Especial Cat-fé', 8500.00, 2800.00, 35, 10, 'TAZA', '2026-12-30'),
(1, 'CAF-002', 'Latte Vainilla Star-Light', 9000.00, 3100.00, 28, 10, 'TAZA', '2026-12-30'),
(1, 'CAF-003', 'Espresso Doble Origen Huila', 6000.00, 1900.00, 50, 15, 'TAZA', '2026-12-30'),
(2, 'FRI-001', 'Matcha Latte Helado Felino', 10500.00, 3800.00, 20, 5, 'VASO', '2026-11-25'),
(3, 'REP-001', 'Cheesecake de Arándanos Silvestres', 12000.00, 5200.00, 12, 4, 'PORCION', '2026-11-11'),
(3, 'REP-002', 'Torta Húmeda de Chocolate 70%', 11500.00, 4900.00, 9, 4, 'PORCION', '2026-11-11'),
(4, 'SNA-001', 'Croissant Francés de Almendras', 7500.00, 3000.00, 0, 5, 'UNIDAD', '2026-11-10'),
(5, 'INS-001', 'Leche de Almendras Orgánica 1L', 4000.00, 12000.00, 6, 3, 'LITRO', '2026-11-10');

-- 5. Mesas del salón (6 mesas con distintos estados)
INSERT INTO mesa (numero, capacidad, estado) VALUES
(1, 4, 'DISPONIBLE'),
(2, 2, 'OCUPADA'),
(3, 4, 'DISPONIBLE'),
(4, 6, 'POR_COBRAR'),
(5, 2, 'DISPONIBLE'),
(6, 4, 'OCUPADA');

-- 6. Pedidos / Comandas (6 órdenes de prueba)
INSERT INTO pedido (mesa_id, usuario_id, fecha_hora, estado, metodo_pago, total) VALUES
(1, 2, '2026-11-08 15:20:00', 'PAGADO', 'EFECTIVO', 29000.00),
(2, 2, '2026-11-08 16:10:00', 'PAGADO', 'TRANSFERENCIA', 30000.00),
(3, 3, '2026-11-08 17:05:00', 'PAGADO', 'DATAFONO', 20500.00),
(2, 2, '2026-11-09 14:30:00', 'EN_PREPARACION', 'PENDIENTE', 17500.00),
(4, 3, '2026-11-09 15:00:00', 'DESPACHADO', 'PENDIENTE', 32500.00),
(6, 2, '2026-11-09 15:45:00', 'PENDIENTE', 'PENDIENTE', 21000.00);

-- 7. Detalle de pedidos (Para alimentar el ranking de Productos Más Vendidos)
INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, precio_unitario, subtotal, notas_preparacion) VALUES
(1, 1, 2, 8500.00, 17000.00, 'Con leche deslactosada y canela'),
(1, 5, 1, 12000.00, 12000.00, 'Para compartir al centro'),
(2, 2, 2, 9000.00, 18000.00, 'Bajo en azúcar'),
(2, 5, 1, 12000.00, 12000.00, 'Sin salsa adicional'),
(3, 1, 1, 8500.00, 8500.00, 'Temperatura extra caliente'),
(3, 5, 1, 12000.00, 12000.00, NULL),
(4, 1, 1, 8500.00, 8500.00, 'Leche de almendras'),
(4, 2, 1, 9000.00, 9000.00, NULL),
(5, 4, 2, 10500.00, 21000.00, 'Con poco hielo'),
(5, 6, 1, 11500.00, 11500.00, 'Calentar 10 segundos'),
(6, 1, 2, 8500.00, 17000.00, 'Arte latte gatito'),
(6, 3, 1, 6000.00, 6000.00, 'En taza precalentada');

-- 8. Mermas y Desperdicios (5 registros con las 3 causales RN-03)
INSERT INTO merma (producto_id, usuario_id, cantidad, motivo, costo_unitario, perdida_total, observacion) VALUES
(8, 4, 2, 'CADUCIDAD', 12000.00, 24000.00, 'Lote de leche de almendras venció en refrigerador secundario'),
(1, 4, 2, 'ERROR_PREPARACION', 2800.00, 5600.00, 'Leche sobrecalentada durante hora pico'),
(5, 5, 1, 'ACCIDENTE_DETERIORO', 5200.00, 5200.00, 'Porción de cheesecake se desmoronó al emplatar'),
(7, 5, 3, 'CADUCIDAD', 3000.00, 9000.00, 'Croissants perdieron crocancia tras 48 horas'),
(4, 4, 1, 'ERROR_PREPARACION', 3800.00, 3800.00, 'Preparación con azúcar cuando el cliente pidió sin endulzar');

-- 9. Cierre de caja histórico
INSERT INTO cierre_caja (usuario_id, fecha_apertura, fecha_cierre, base_inicial, total_efectivo, total_transferencia, total_datafono, total_mermas, observaciones) VALUES
(1, '2026-11-08 08:00:00', '2026-11-08 20:00:00', 100000.00, 29000.00, 30000.00, 20500.00, 47600.00, 'Cierre de jornada sábado sin descuadres de efectivo')