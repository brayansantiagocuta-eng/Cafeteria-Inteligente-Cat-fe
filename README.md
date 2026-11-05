# Cafetería Inteligente Cat-fé 🐾☕

Sistema web integral de gestión gastronómica y analítica operativa para la cafetería temática **Cat-fé**, desarrollado bajo arquitectura **MVC** con **PHP 8+**, **MySQL**, **Bootstrap 5** y **JavaScript vanilla**.

Proyecto individual de desarrollo de software para el tecnólogo en **ADSO - SENA**.
**Aprendiz:** Brayan Santiago Cuta  
**Instructora:** Joan Castillo Celis  

---

## 🎯 Enfoque del Proyecto y Funcionalidad Innovadora
- **Gestión Operativa:** Control de catálogo de productos (cafetería, repostería, snacks), gestión de mesas, comandas/pedidos en tiempo real y facturación.
- **Funcionalidad Innovadora Clave:**
  1. **Análisis de productos más vendidos:** Matriz de rotación y demanda periódica para optimizar compras y menú.
  2. **Control integral de desperdicios y mermas:** Registro estricto de pérdidas por caducidad, preparación defectuosa o manipulación, calculando el impacto financiero en el costo de venta.

---

## 📂 Arquitectura del Proyecto (MVC)
```text
Cat-fé/
├── app/
│   ├── config/          # Conexión PDO a base de datos y parámetros globales
│   ├── controllers/     # Controladores del flujo de negocio
│   ├── models/          # Modelos de datos y consultas PDO
│   └── views/           # Vistas renderizadas (HTML5, Bootstrap 5)
├── database/            # Scripts DDL/DML (schema.sql, datos_prueba.sql, consultas.sql)
├── docs/                # Documentación de sesiones ADSO, requisitos IEEE 29148, diagramas
├── public/              # Archivos estáticos accesibles al navegador
│   ├── css/
│   ├── js/
│   └── img/
├── tests/               # Casos de prueba y validaciones
├── index.php            # Front Controller (enrutador central)
└── README.md            # Documentación general del repositorio
```

---

## 🛠️ Tecnologías Obligatorias
- **Backend:** PHP 8+ (POO, PDO, sin frameworks externos).
- **Base de Datos:** MySQL / MariaDB (XAMPP + MySQL Workbench).
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript.
- **Herramientas de Gestión y Diseño:** Git, GitHub, Jira (Scrum), Figma.
- **Estándar de Requisitos:** ISO/IEC/IEEE 29148:2018.
