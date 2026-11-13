-- ============================================================================
-- SCRIPT OPTIMIZADO PARA INGENIERÍA INVERSA EN MYSQL WORKBENCH
-- Compatible 100% con MariaDB / MySQL sin errores de sintaxis ni cierres forzados
-- ============================================================================

DROP SCHEMA IF EXISTS catfe_db;
CREATE SCHEMA catfe_db DEFAULT CHARACTER SET utf8mb4;
USE catfe_db;

-- 1. rol
CREATE TABLE IF NOT EXISTS rol (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(40) NOT NULL,
  descripcion VARCHAR(150) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX uq_rol_nombre (nombre ASC)
) ENGINE = InnoDB;

-- 2. usuario
CREATE TABLE IF NOT EXISTS usuario (
  id INT NOT NULL AUTO_INCREMENT,
  rol_id INT NOT NULL,
  nombre_completo VARCHAR(100) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  activo TINYINT(1) NOT NULL DEFAULT 1,
  creado_en DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX uq_usuario_correo (correo ASC),
  INDEX idx_usuario_rol (rol_id ASC),
  CONSTRAINT fk_usuario_rol
    FOREIGN KEY (rol_id)
    REFERENCES rol (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- 3. categoria
CREATE TABLE IF NOT EXISTS categoria (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(60) NOT NULL,
  descripcion VARCHAR(150) NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX uq_categoria_nombre (nombre ASC)
) ENGINE = InnoDB;

-- 4. producto
CREATE TABLE IF NOT EXISTS producto (
  id INT NOT NULL AUTO_INCREMENT,
  categoria_id INT NOT NULL,
  codigo VARCHAR(20) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  precio_venta DECIMAL(10,2) NOT NULL,
  costo_unitario DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  stock_minimo INT NOT NULL DEFAULT 5,
  unidad_medida VARCHAR(20) NOT NULL DEFAULT 'UNIDAD',
  fecha_caducidad DATE NULL,
  activo TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (id),
  UNIQUE INDEX uq_producto_codigo (codigo ASC),
  INDEX idx_producto_categoria (categoria_id ASC),
  CONSTRAINT fk_producto_categoria
    FOREIGN KEY (categoria_id)
    REFERENCES categoria (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- 5. mesa
CREATE TABLE IF NOT EXISTS mesa (
  id INT NOT NULL AUTO_INCREMENT,
  numero INT NOT NULL,
  capacidad INT NOT NULL DEFAULT 4,
  estado VARCHAR(20) NOT NULL DEFAULT 'DISPONIBLE',
  PRIMARY KEY (id),
  UNIQUE INDEX uq_mesa_numero (numero ASC)
) ENGINE = InnoDB;

-- 6. pedido
CREATE TABLE IF NOT EXISTS pedido (
  id INT NOT NULL AUTO_INCREMENT,
  mesa_id INT NOT NULL,
  usuario_id INT NOT NULL,
  fecha_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  estado VARCHAR(20) NOT NULL DEFAULT 'PENDIENTE',
  metodo_pago VARCHAR(20) NOT NULL DEFAULT 'PENDIENTE',
  total DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (id),
  INDEX idx_pedido_mesa (mesa_id ASC),
  INDEX idx_pedido_usuario (usuario_id ASC),
  CONSTRAINT fk_pedido_mesa
    FOREIGN KEY (mesa_id)
    REFERENCES mesa (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT fk_pedido_usuario
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- 7. detalle_pedido
CREATE TABLE IF NOT EXISTS detalle_pedido (
  id INT NOT NULL AUTO_INCREMENT,
  pedido_id INT NOT NULL,
  producto_id INT NOT NULL,
  cantidad INT NOT NULL,
  precio_unitario DECIMAL(10,2) NOT NULL,
  subtotal DECIMAL(10,2) NOT NULL,
  notas_preparacion VARCHAR(200) NULL,
  PRIMARY KEY (id),
  INDEX idx_detalle_pedido (pedido_id ASC),
  INDEX idx_detalle_producto (producto_id ASC),
  CONSTRAINT fk_detalle_pedido
    FOREIGN KEY (pedido_id)
    REFERENCES pedido (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_detalle_producto
    FOREIGN KEY (producto_id)
    REFERENCES producto (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- 8. merma
CREATE TABLE IF NOT EXISTS merma (
  id INT NOT NULL AUTO_INCREMENT,
  producto_id INT NOT NULL,
  usuario_id INT NOT NULL,
  cantidad INT NOT NULL,
  motivo VARCHAR(30) NOT NULL,
  costo_unitario DECIMAL(10,2) NOT NULL,
  perdida_total DECIMAL(10,2) NOT NULL,
  observacion VARCHAR(255) NULL,
  fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_merma_producto (producto_id ASC),
  INDEX idx_merma_usuario (usuario_id ASC),
  CONSTRAINT fk_merma_producto
    FOREIGN KEY (producto_id)
    REFERENCES producto (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT fk_merma_usuario
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- 9. cierre_caja
CREATE TABLE IF NOT EXISTS cierre_caja (
  id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  fecha_apertura DATETIME NOT NULL,
  fecha_cierre DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  base_inicial DECIMAL(10,2) NOT NULL DEFAULT 100000.00,
  total_efectivo DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  total_transferencia DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  total_datafono DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  total_mermas DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  observaciones VARCHAR(255) NULL,
  PRIMARY KEY (id),
  INDEX idx_cierre_usuario (usuario_id ASC),
  CONSTRAINT fk_cierre_usuario
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
) ENGINE = InnoDB;
