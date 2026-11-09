-- ============================================================================
-- PROYECTO: SISTEMA INTELIGENTE DE GESTIÓN "CAT-FÉ" (CAFETERÍA STAR-LIGHT)
-- TECNÓLOGO EN ANÁLISIS Y DESARROLLO DE SOFTWARE (ADSO) - SENA
-- APRENDIZ: BRAYAN SANTIAGO CUTA
-- SESIÓN 5: MODELO DE DATOS RELACIONAL NORMALIZADO (3FN) - DDL
-- ============================================================================

DROP DATABASE IF EXISTS catfe_db;
CREATE DATABASE catfe_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE catfe_db;

-- ----------------------------------------------------------------------------
-- 1. TABLA: rol (Normalización de perfiles de acceso RBAC)
-- ----------------------------------------------------------------------------
CREATE TABLE rol (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL UNIQUE,
    descripcion VARCHAR(150) NOT NULL
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 2. TABLA: usuario (Empleados y administradores del establecimiento)
-- ----------------------------------------------------------------------------
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol_id INT NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    creado_en DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuario_rol FOREIGN KEY (rol_id) REFERENCES rol(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 3. TABLA: categoria (Clasificación del catálogo gastronómico)
-- ----------------------------------------------------------------------------
CREATE TABLE categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(60) NOT NULL UNIQUE,
    descripcion VARCHAR(150) NULL
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 4. TABLA: producto (Catálogo de bebidas, repostería e insumos con caducidad)
-- ----------------------------------------------------------------------------
CREATE TABLE producto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT NOT NULL,
    codigo VARCHAR(20) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL CHECK (precio_venta >= 0),
    costo_unitario DECIMAL(10,2) NOT NULL CHECK (costo_unitario >= 0),
    stock INT NOT NULL DEFAULT 0,
    stock_minimo INT NOT NULL DEFAULT 5,
    unidad_medida VARCHAR(20) NOT NULL DEFAULT 'UNIDAD',
    fecha_caducidad DATE NULL,
    activo TINYINT(1) NOT NULL DEFAULT 1,
    CONSTRAINT fk_producto_categoria FOREIGN KEY (categoria_id) REFERENCES categoria(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 5. TABLA: mesa (Control físico de ubicaciones en salón de Star-Light)
-- ----------------------------------------------------------------------------
CREATE TABLE mesa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL UNIQUE,
    capacidad INT NOT NULL DEFAULT 4,
    estado ENUM('DISPONIBLE', 'OCUPADA', 'POR_COBRAR', 'MANTENIMIENTO') NOT NULL DEFAULT 'DISPONIBLE'
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 6. TABLA: pedido (Encabezado de comanda digital asociada a mesa y mesero)
-- ----------------------------------------------------------------------------
CREATE TABLE pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mesa_id INT NOT NULL,
    usuario_id INT NOT NULL,
    fecha_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('PENDIENTE', 'EN_PREPARACION', 'DESPACHADO', 'PAGADO', 'ANULADO') NOT NULL DEFAULT 'PENDIENTE',
    metodo_pago ENUM('EFECTIVO', 'TRANSFERENCIA', 'DATAFONO', 'PENDIENTE') NOT NULL DEFAULT 'PENDIENTE',
    total DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    CONSTRAINT fk_pedido_mesa FOREIGN KEY (mesa_id) REFERENCES mesa(id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_pedido_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 7. TABLA: detalle_pedido (Resolución N:M entre pedido y producto)
-- ----------------------------------------------------------------------------
CREATE TABLE detalle_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL CHECK (cantidad > 0),
    precio_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    notas_preparacion VARCHAR(200) NULL,
    CONSTRAINT fk_detalle_pedido FOREIGN KEY (pedido_id) REFERENCES pedido(id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_detalle_producto FOREIGN KEY (producto_id) REFERENCES producto(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 8. TABLA: merma (MÓDULO INNOVADOR: Control y costeo de desperdicios - RN-03)
-- ----------------------------------------------------------------------------
CREATE TABLE merma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    usuario_id INT NOT NULL,
    cantidad INT NOT NULL CHECK (cantidad > 0),
    motivo ENUM('CADUCIDAD', 'ERROR_PREPARACION', 'ACCIDENTE_DETERIORO') NOT NULL,
    costo_unitario DECIMAL(10,2) NOT NULL,
    perdida_total DECIMAL(10,2) NOT NULL,
    observacion VARCHAR(255) NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_merma_producto FOREIGN KEY (producto_id) REFERENCES producto(id)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_merma_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ----------------------------------------------------------------------------
-- 9. TABLA: cierre_caja (Control e inmutabilidad contable por jornada - RN-05)
-- ----------------------------------------------------------------------------
CREATE TABLE cierre_caja (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    fecha_apertura DATETIME NOT NULL,
    fecha_cierre DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    base_inicial DECIMAL(10,2) NOT NULL DEFAULT 100000.00,
    total_efectivo DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    total_transferencia DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    total_datafono DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    total_mermas DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    observaciones VARCHAR(255) NULL,
    CONSTRAINT fk_cierre_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;
