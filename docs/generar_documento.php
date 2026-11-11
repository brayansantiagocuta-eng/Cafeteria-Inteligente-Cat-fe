<?php
// Script de generación de documento de entrega formal para la Sesión 4 UX/UI
$htmlContent = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Entregable Sesión 4: Diseño UX/UI en Figma y Prototipos - Brayan Cuta</title>
    <style>
        body { font-family: "Segoe UI", Arial, sans-serif; margin: 40px; color: #212529; line-height: 1.6; }
        h1, h2, h3 { color: #2E2300; font-family: "Georgia", serif; }
        .header { border-bottom: 3px solid #C05805; padding-bottom: 15px; margin-bottom: 25px; }
        .badge { background: #DB9501; color: #2E2300; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .card { border: 1px solid #E8E2D8; border-radius: 8px; padding: 15px; margin-bottom: 20px; background: #FAF7F2; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { border: 1px solid #D3CBBF; padding: 8px 12px; text-align: left; }
        th { background: #2E2300; color: #FFF; }
        .color-box { display: inline-block; width: 18px; height: 18px; vertical-align: middle; margin-right: 6px; border-radius: 3px; }
        .img-preview { max-width: 100%; border: 1px solid #CCC; border-radius: 6px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>SERVICIO NACIONAL DE APRENDIZAJE (SENA)</h1>
        <h3>CENTRO DE GESTIÓN DE MERCADOS, LOGÍSTICA Y TECNOLOGÍAS DE LA INFORMACIÓN</h3>
        <h4>TECNÓLOGO EN ANÁLISIS Y DESARROLLO DE SOFTWARE (ADSO) · FICHA FORMATIVA</h4>
        <h2>ENTREGABLE SESIÓN 4: DISEÑO UX/UI, FIGMA Y ARQUITECTURA DE INTERFACES</h2>
        <p><strong>Aprendiz:</strong> Brayan Santiago Cuta | <strong>Instructora:</strong> Joan Castillo Celis | <strong>Proyecto:</strong> Cat-fé (Star-Light)</p>
    </div>

    <div class="card">
        <h3>🔗 Enlaces Oficiales del Proyecto</h3>
        <p>• <strong>Repositorio GitHub Oficial:</strong> <a href="https://github.com/brayansantiagocuta-eng/Cafeteria-Inteligente-Cat-fe">https://github.com/brayansantiagocuta-eng/Cafeteria-Inteligente-Cat-fe</a></p>
        <p>• <strong>Prototipo e Interfaz en Figma (Community UI Kit):</strong> <a href="https://www.figma.com/design/GwgEthn0stK0FE0I2I3cNi/Mobile-UI-Kit--Ecommerce--Community-?node-id=134-12">Figma Mobile UI Kit E-commerce</a></p>
        <p>• <strong>Servidor Local XAMPP Web:</strong> <code>http://localhost/Cat-fé/</code></p>
        <p>• <strong>Proyecto Móvil Android Studio:</strong> <code>C:\Users\maria\AndroidStudioProjects\Catf</code></p>
    </div>

    <h2>1. Sistema de Diseño y Paleta Oficial Canva</h2>
    <table>
        <tr>
            <th>Nombre del Color</th>
            <th>Código Hexadecimal</th>
            <th>Uso Arquitectónico en Cat-fé</th>
        </tr>
        <tr>
            <td><span class="color-box" style="background:#2E2300;"></span> Bark (Corteza Oscura)</td>
            <td>#2E2300</td>
            <td>Color primario: Navbars, Sidebars, encabezados y botones de acción principal.</td>
        </tr>
        <tr>
            <td><span class="color-box" style="background:#6E6702;"></span> Seaweed Green (Verde Alga)</td>
            <td>#6E6702</td>
            <td>Color de éxito: Mesas disponibles, ventas en positivo y órdenes entregadas.</td>
        </tr>
        <tr>
            <td><span class="color-box" style="background:#C05805;"></span> Bronze (Bronce Cálido)</td>
            <td>#C05805</td>
            <td>Color secundario: Estados hover, timeline de preparación, mesas ocupadas.</td>
        </tr>
        <tr>
            <td><span class="color-box" style="background:#DB9501;"></span> Goldenrod (Vara de Oro)</td>
            <td>#DB9501</td>
            <td>Color destacado: Badges de Top Vendidos, círculos activos en móvil y PIN.</td>
        </tr>
    </table>

    <h2>2. Evidencias de los 10 Módulos y Pantallas Diseñadas</h2>
    <ol>
        <li><strong>Login Dividido:</strong> Fotografía minimalista de café a la izquierda y formulario a la derecha con botón de acceso PIN.</li>
        <li><strong>Dashboard General:</strong> 4 tarjetas KPIs (ventas, pedidos, Top Vendidos, ticket), gráfico Chart.js y barra de actividad.</li>
        <li><strong>Plano de Mesas con Separación:</strong> Arquitectura por zonas (Cabinas privadas verdes, Salón Central azul en 2 pasillos, Lounge familiar rosado y Barra semicircular).</li>
        <li><strong>Estante Modular de Inventario:</strong> Estantería con cajas amarillas ilustradas (Nivel 1, 2 y 3) con alertas de caducidad en 48h.</li>
        <li><strong>Menú Digital Interactivo:</strong> Pestañas deslizables por categoría, buscador en vivo, alérgenos y switch disponible/agotado.</li>
        <li><strong>Listado de Órdenes:</strong> Tabla con selección múltiple en lote, ordenamiento por columnas y paginación fija.</li>
        <li><strong>Formulario en 2 Columnas:</strong> Registro de producto con botones +/- numéricos, selector de categoría y contador de caracteres.</li>
        <li><strong>Ficha de Detalle de Pedido:</strong> Desglose minucioso de consumos y Timeline de preparación secuencial.</li>
        <li><strong>Modales Emergentes:</strong> Modal backdrop para confirmación de eliminación y modal de personalización de bebida.</li>
        <li><strong>Reportes & Mermas:</strong> Análisis de Top Vendidos y cuantificación financiera de pérdidas por caducidad o fallos en barra.</li>
    </ol>
</body>
</html>
';

file_put_contents('C:\xampp\htdocs\Cat-fé\docs\entregable_sesion4_ux_ui.html', $htmlContent);
echo "Documento HTML generado con éxito.\n";
