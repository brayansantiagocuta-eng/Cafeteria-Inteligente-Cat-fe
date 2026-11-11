<?php
// Script para generar el Entregable completo en HTML, Word (.doc / .docx) y PDF (.pdf)
// con todas las capturas incrustadas en Base64 y los enlaces oficiales.

$capturasDir = __DIR__ . '\\capturas';
$imgRefDir   = dirname(__DIR__) . '\\public\\img';

function imgToBase64($path) {
    if (!file_exists($path)) return '';
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    $mime = ($ext === 'jpg' || $ext === 'jpeg') ? 'image/jpeg' : 'image/png';
    $data = file_get_contents($path);
    return 'data:' . $mime . ';base64,' . base64_encode($data);
}

$modulos = [
    [
        'num' => '1',
        'titulo' => '🔑 1. Login (Acceso al Sistema y Modal PIN Rápido)',
        'archivo' => '01_login.png',
        'desc' => 'Punto de entrada limpio y seguro con pantalla dividida: panel izquierdo con fotografía minimalista de café de especialidad e identidad corporativa de Star-Light (Cat-fé); panel derecho con campos de Correo/Usuario, Contraseña, enlace de recuperación "¿Olvidaste tu contraseña?", botón principal con estado Hover activo y acceso rápido mediante código PIN táctil para cajeros en tabletas.'
    ],
    [
        'num' => '2',
        'titulo' => '📊 2. Dashboard (Panel Principal y Métricas en Tiempo Real)',
        'archivo' => '02_dashboard.png',
        'desc' => 'Vista general del negocio al iniciar sesión con rol Administrador. Incluye 4 tarjetas KPI (Total de ventas del día, Pedidos pendientes, Top Vendidos y Ticket promedio), gráfico interactivo de rendimiento de ventas por hora (Chart.js) para prever horas pico, listado de actividad reciente en barra (En preparación, Listo, Entregado) y barra lateral desplegable al pasar el mouse (Hover Sidebar).'
    ],
    [
        'num' => '3',
        'titulo' => '🪑 3. Plano Arquitectónico de Mesas con Separación por Zonas',
        'archivo' => '03_mesas.png',
        'desc' => 'Distribución espacial interactiva inspirada en el plano arquitectónico del local Star-Light: Zona Superior de Cabinas Privadas (Booths B-01 a B-04), Salón Familiar Izquierdo (Mesas L-01 a L-03), Salón Central dividido en 2 pasillos (Mesas M-01 a M-08), Barra Semicircular a la derecha y bloque inferior de Cocina (Kitchen) y Oficina.'
    ],
    [
        'num' => '4',
        'titulo' => '📦 4. Inventario Modular en Estantería de Cajas (FEFO y Perecederos)',
        'archivo' => '04_inventario.png',
        'desc' => 'Reemplazo de tablas planas por una estantería visual de 3 niveles con recuadros tipo cajas de almacén ilustradas. Muestra el código SKU, lote, fecha de vencimiento, barra de progreso de existencias y etiquetas de estado (Óptimo, Stock Bajo y Alerta Crítica FEFO 48h).'
    ],
    [
        'num' => '5',
        'titulo' => '📜 5. Menú Digital (Gestión e Interfaz de Productos)',
        'archivo' => '05_menu.png',
        'desc' => 'Visualización y administración del catálogo de la cafetería con pestañas superiores deslizables por categoría (Todos, Cafés de Origen, Bebidas Frías, Repostería, Desayunos), buscador en tiempo real en la barra superior, tarjetas con fotografía en alta resolución, precio, etiqueta de alérgenos y switch interactivo de disponibilidad (Activo/Agotado).'
    ],
    [
        'num' => '6',
        'titulo' => '📋 6. Listados Masivos (Tablas de Datos de Pedidos y Clientes)',
        'archivo' => '06_listados.png',
        'desc' => 'Tabla estructurada con columnas claras (Checkboxes para acciones en lote, ID de Orden, Cliente/Mesa, Fecha y Hora, Total, Estado y Acciones), ordenamiento por columnas y paginación inferior fija configurable (10, 25, 50 resultados).'
    ],
    [
        'num' => '7',
        'titulo' => '📝 7. Formularios en Dos Columnas (Creación y Edición)',
        'archivo' => '07_formularios.png',
        'desc' => 'Estructura ergonómica en 2 columnas para evitar fatiga visual al registrar productos o insumos. Incorpora selectores desplegables (Dropdowns) para categorías, inputs numéricos con botones +/- para precios y stock, selectores de alérgenos y área de texto con contador de límite de 180 caracteres.'
    ],
    [
        'num' => '8',
        'titulo' => '🔍 8. Vista de Detalle de Pedido y Línea de Tiempo (Timeline)',
        'archivo' => '08_detalle.png',
        'desc' => 'Desglose minucioso de la Orden #ORD-904: indicador superior con Línea de Tiempo secuencial (Recibido ☕ -> En cocina 🍪 -> Listo para entrega ✔️), panel izquierdo con datos del cliente y notas de barista, y panel derecho con subtotales, impuesto al consumo (8%) y método de pago.'
    ],
    [
        'num' => '9',
        'titulo' => '🗔 9. Modales Emergentes (Personalización y Confirmación)',
        'archivo' => '09_modal_toast.png',
        'desc' => 'Ventanas superpuestas con fondo oscurecido (backdrop) para evitar recargas de página: modal de personalización de bebida (tipo de leche entera/almendra/avena, nivel de azúcar y extras como espresso shot o jarabe de vainilla) y modal de confirmación de eliminación segura.'
    ],
    [
        'num' => '10',
        'titulo' => '📈 10. Reportes Analíticos: Top Vendidos y Control de Mermas',
        'archivo' => '10_reportes.png',
        'desc' => 'Módulo gerencial para toma de decisiones del Administrador. Incluye filtros de fecha (Hoy, Esta semana, Mes actual, Personalizado), botones discretos de exportación a PDF y Excel, ranking de productos Top Vendidos y desglose financiero de pérdidas por desperdicio o merma de inventario (-$47.600 COP).'
    ],
    [
        'num' => '11',
        'titulo' => '⚠️ 11. Mensajes de Error, Validación de Campos y Alertas Toast',
        'archivo' => '11_validacion.png',
        'desc' => 'Indicadores visuales de asistencia al usuario: bordes rojos en campos obligatorios vacíos o con valores negativos acompañados de texto aclaratorio inferior, y notificaciones emergentes temporales (Toasts/Snackbars) en la esquina superior derecha en color verde (éxito) o rojo (error/declinación).'
    ],
    [
        'num' => '12',
        'titulo' => '📱 12. Diseño Responsive Mobile (390 px) con Barra Inferior y Círculo Activo',
        'archivo' => '12_mobile_resp.png',
        'desc' => 'Adaptabilidad completa a dispositivos móviles (390 x 844 px) y aplicación Android en Kotlin siguiendo los wireframes de referencia. Cuenta con barra de navegación inferior fija (Bottom Navigation Bar) donde el ícono seleccionado se ilumina dentro de un círculo claro dorado (#DB9501) y despliega cada módulo al instante.'
    ]
];

$imgEstante = imgToBase64($imgRefDir . '\\estante_cajas.png');
$imgPlano   = imgToBase64($imgRefDir . '\\plano_mesas.png');

$seccionesHtml = '';
foreach ($modulos as $m) {
    $rutaImg = $capturasDir . '\\' . $m['archivo'];
    $b64 = imgToBase64($rutaImg);
    $imgTag = $b64 ? '<img src="' . $b64 . '" class="screenshot" alt="' . htmlspecialchars($m['titulo']) . '" />'
                   : '<p style="color:#b91c1c;">[Captura no encontrada: ' . htmlspecialchars($m['archivo']) . ']</p>';

    $seccionesHtml .= '
    <div class="module-block">
        <h3>' . htmlspecialchars($m['titulo']) . '</h3>
        <p class="module-desc">' . htmlspecialchars($m['desc']) . '</p>
        <div class="img-container">
            ' . $imgTag . '
        </div>
    </div>';
}

$html = '<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40"
      lang="es">
<head>
    <meta charset="UTF-8">
    <title>Entregable Diseño UX/UI, Prototipo y Capturas - Cat-fé (Star-Light)</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 1.8cm;
        }
        body {
            font-family: "Segoe UI", "Inter", Arial, sans-serif;
            color: #212529;
            line-height: 1.55;
            font-size: 11pt;
            margin: 0;
            padding: 0;
        }
        .cover-header {
            border-bottom: 4px solid #C05805;
            padding-bottom: 14px;
            margin-bottom: 20px;
            background-color: #FBF9F5;
            padding: 18px;
            border-radius: 8px;
        }
        h1 {
            color: #2E2300;
            font-size: 18pt;
            margin: 0 0 6px 0;
        }
        h2 {
            color: #2E2300;
            font-size: 14pt;
            border-left: 5px solid #DB9501;
            padding-left: 10px;
            margin-top: 24px;
            margin-bottom: 10px;
        }
        h3 {
            color: #C05805;
            font-size: 12pt;
            margin-top: 16px;
            margin-bottom: 6px;
        }
        .meta-line {
            font-size: 10.5pt;
            color: #495057;
            margin: 4px 0;
        }
        .links-box {
            border: 2px solid #DB9501;
            background-color: #FFFDF7;
            border-radius: 8px;
            padding: 14px 18px;
            margin-bottom: 22px;
        }
        .links-box a {
            color: #C05805;
            font-weight: bold;
            text-decoration: underline;
            word-break: break-all;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0 20px 0;
            font-size: 10pt;
        }
        th, td {
            border: 1px solid #D3CBBF;
            padding: 8px 10px;
            text-align: left;
            vertical-align: middle;
        }
        th {
            background-color: #2E2300;
            color: #FFFFFF;
            font-weight: bold;
        }
        .swatch {
            display: inline-block;
            width: 16px;
            height: 16px;
            border-radius: 3px;
            margin-right: 6px;
            vertical-align: middle;
            border: 1px solid #333;
        }
        .module-block {
            page-break-inside: avoid;
            border: 1px solid #E5DEC9;
            background-color: #FBF9F5;
            border-radius: 8px;
            padding: 14px;
            margin-bottom: 22px;
        }
        .module-desc {
            margin: 4px 0 10px 0;
            color: #343A40;
            font-size: 10.5pt;
        }
        .img-container {
            text-align: center;
            margin-top: 8px;
        }
        .screenshot {
            max-width: 100%;
            height: auto;
            border: 1px solid #C8BFA8;
            border-radius: 6px;
        }
        .prompt-box {
            background-color: #2E2300;
            color: #FBF9F5;
            padding: 16px;
            border-radius: 8px;
            font-family: Consolas, monospace;
            font-size: 9.5pt;
            white-space: pre-wrap;
            margin-top: 12px;
        }
    </style>
</head>
<body>

    <div class="cover-header">
        <h1>SERVICIO NACIONAL DE APRENDIZAJE (SENA)</h1>
        <div class="meta-line"><strong>Programa:</strong> Tecnólogo en Análisis y Desarrollo de Software (ADSO)</div>
        <div class="meta-line"><strong>Proyecto:</strong> Sistema de Gestión Gastronómica e Inventario Perecedero <strong>Cat-fé</strong> — Cafetería de Especialidad <strong>Star-Light</strong></div>
        <div class="meta-line"><strong>Aprendiz:</strong> Brayan Santiago Cuta &nbsp;|&nbsp; <strong>Instructora:</strong> Joan Castillo Celis</div>
        <div class="meta-line"><strong>Entregable:</strong> Diseño UX/UI, Wireframes en Figma, Sistema de Diseño y Capturas de las Interfaces (Web Desktop 1440px, Mobile 390px y Android Kotlin)</div>
    </div>

    <div class="links-box">
        <h3 style="margin-top:0;">🔗 Enlaces Oficiales del Proyecto y Prototipo Figma</h3>
        <p style="margin:6px 0;">
            📌 <strong>Enlace de Figma (Wireframes & Mobile UI Kit de Referencia):</strong><br/>
            <a href="https://www.figma.com/design/GwgEthn0stK0FE0I2I3cNi/Mobile-UI-Kit--Ecommerce--Community-?node-id=134-12&t=0SqVG182i80fEhvF-1">https://www.figma.com/design/GwgEthn0stK0FE0I2I3cNi/Mobile-UI-Kit--Ecommerce--Community-?node-id=134-12&amp;t=0SqVG182i80fEhvF-1</a>
        </p>
        <p style="margin:6px 0;">
            💻 <strong>Repositorio Oficial en GitHub:</strong><br/>
            <a href="https://github.com/brayansantiagocuta-eng/Cafeteria-Inteligente-Cat-fe">https://github.com/brayansantiagocuta-eng/Cafeteria-Inteligente-Cat-fe</a>
        </p>
        <p style="margin:6px 0;">
            🌐 <strong>Ruta Local de Ejecución Web (XAMPP):</strong> <code>http://localhost/Cat-fé/public/index.php</code><br/>
            📱 <strong>Ruta del Proyecto Android Studio (Jetpack Compose):</strong> <code>C:\Users\maria\AndroidStudioProjects\Catf</code>
        </p>
    </div>

    <h2>1. Sistema de Diseño: Paleta de Colores Oficial y Tipografía</h2>
    <p>El sistema visual de <strong>Cat-fé</strong> para la cafetería <strong>Star-Light</strong> emplea la paleta cálida otoñal definida en Canva y un par tipográfico de alta legibilidad con contraste verificado bajo el estándar WCAG 2.1 AA.</p>

    <table>
        <thead>
            <tr>
                <th>Muestra</th>
                <th>Nombre del Color</th>
                <th>Código HEX</th>
                <th>Aplicación en la Interfaz</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><span class="swatch" style="background-color:#2E2300;"></span></td>
                <td><strong>Bark (Corteza Profunda)</strong></td>
                <td><code>#2E2300</code></td>
                <td>Color primario en barra lateral desplegable (Sidebar), encabezados, botones principales y barra inferior móvil.</td>
            </tr>
            <tr>
                <td><span class="swatch" style="background-color:#6E6702;"></span></td>
                <td><strong>Seaweed Green (Verde Oliva)</strong></td>
                <td><code>#6E6702</code></td>
                <td>Estados positivos, indicadores de mesas disponibles, lotes óptimos en estantería y toasts de confirmación.</td>
            </tr>
            <tr>
                <td><span class="swatch" style="background-color:#C05805;"></span></td>
                <td><strong>Bronze (Bronce Tostado)</strong></td>
                <td><code>#C05805</code></td>
                <td>Color de acento secundario, estados Hover activos, línea de tiempo en preparación y alertas preventivas.</td>
            </tr>
            <tr>
                <td><span class="swatch" style="background-color:#DB9501;"></span></td>
                <td><strong>Goldenrod (Oro Cálido)</strong></td>
                <td><code>#DB9501</code></td>
                <td>Círculo indicador activo en navegación móvil, insignias de <em>Top Vendidos</em>, cajas de inventario y botón PIN.</td>
            </tr>
            <tr>
                <td><span class="swatch" style="background-color:#FBF9F5;"></span></td>
                <td><strong>Light Cream (Crema Suave)</strong></td>
                <td><code>#FBF9F5</code></td>
                <td>Fondo general de las pantallas Desktop (1440 px) y Mobile (390 px) para evitar fatiga visual.</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th>Fuente Tipográfica</th>
                <th>Rol en el Sistema</th>
                <th>Pesos y Tamaños</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Poppins</strong> (Sans-Serif Geométrica)</td>
                <td>Títulos principales, KPIs numéricos y encabezados de módulos</td>
                <td>SemiBold (600) y Bold (700) — 18 px a 28 px</td>
            </tr>
            <tr>
                <td><strong>Inter</strong> (Sans-Serif Humanista)</td>
                <td>Cuerpo de texto, tablas de datos, etiquetas de formulario y badges</td>
                <td>Regular (400), Medium (500) y SemiBold (600) — 12 px a 16 px</td>
            </tr>
        </tbody>
    </table>

    <h2>2. Capturas de Pantalla de las Interfaces y Módulos del Sistema</h2>
    <p>A continuación se presentan las capturas reales de cada una de las pantallas diseñadas e implementadas en el sistema <strong>Cat-fé</strong>:</p>

    ' . $seccionesHtml . '

    <h2>3. Especificación Técnica y Prompt Maestro del Diseño</h2>
    <p>Resumen estructurado del contexto del proyecto y especificaciones técnicas utilizadas para la construcción de las interfaces web y móvil:</p>
    <div class="prompt-box">CONTEXTO DEL PROYECTO:
Sistema web y móvil "Cat-fé" desarrollado para la Cafetería de Especialidad "Star-Light" (Proyecto formativo SENA ADSO - Brayan Santiago Cuta). Resuelve la pérdida de trazabilidad de insumos perecederos mediante control FEFO en estanterías visuales, mapa arquitectónico de mesas por zonas, análisis de productos "Top Vendidos" y cuantificación financiera de "Mermas y Desperdicios".

ESPECIFICACIONES DE DISEÑO APLICADAS:
1. Paleta cromática Canva: Bark (#2E2300), Seaweed Green (#6E6702), Bronze (#C05805), Goldenrod (#DB9501) y fondo crema (#FBF9F5).
2. Tipografía: Máximo 2 fuentes (Poppins para encabezados y KPIs; Inter para tablas, formularios y controles).
3. Frames y Adaptabilidad: Diseño Desktop a 1440 px con menú lateral desplegable al pasar el mouse (Hover Sidebar) bajo el rol "Administrador", y diseño Mobile a 390 px (más app nativa en Android Studio con Jetpack Compose) con barra de navegación inferior fija cuyo ícono activo se resalta con un círculo dorado claro (#DB9501).
4. Los 10 módulos integrados: (1) Login dividido con acceso PIN, (2) Dashboard con 4 KPIs y gráfico horario, (3) Plano de mesas separado por zonas y Menú digital con buscador y switches, (4) Inventario en estantería de cajas amarillas y Listados paginados con checkboxes, (5) Formulario en 2 columnas con botones +/-, (6) Vista de detalle con Timeline de preparación, (7) Modales de confirmación y personalización de bebidas, (8) Reportes con Top Vendidos, Mermas y exportación PDF/Excel, (9) Validación en rojo y Toasts flotantes, y (10) Diseño Responsive integral.</div>

</body>
</html>';

$htmlPath = __DIR__ . '\\Entregable_Sesion4_UX_UI_Catfe.html';
$docPath  = __DIR__ . '\\Entregable_Sesion4_UX_UI_Catfe.doc';
$pdfPath  = __DIR__ . '\\Entregable_Sesion4_UX_UI_Catfe.pdf';

file_put_contents($htmlPath, $html);
file_put_contents($docPath, "\xEF\xBB\xBF" . $html);

$edge = 'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe';
$fileUrl = 'file:///C:/xampp/htdocs/Cat-f%C3%A9/docs/Entregable_Sesion4_UX_UI_Catfe.html';
$cmdPdf = '"' . $edge . '" --headless=new --disable-gpu --no-sandbox --print-to-pdf-no-header --print-to-pdf="' . $pdfPath . '" "' . $fileUrl . '" 2>&1';
exec($cmdPdf);

echo "Archivos HTML, DOC y PDF generados correctamente.\n";
if (file_exists($pdfPath)) {
    echo "PDF size: " . filesize($pdfPath) . " bytes\n";
}
echo "DOC size: " . filesize($docPath) . " bytes\n";

// Generar también un archivo nativo .docx usando Word COM o paquete OpenXML
$docxPath = __DIR__ . '\\Entregable_Sesion4_UX_UI_Catfe.docx';
$tmpDir = __DIR__ . '\\_docx_tmp';
if (!is_dir($tmpDir)) mkdir($tmpDir, 0777, true);
if (!is_dir($tmpDir . '\\_rels')) mkdir($tmpDir . '\\_rels', 0777, true);
if (!is_dir($tmpDir . '\\word')) mkdir($tmpDir . '\\word', 0777, true);
if (!is_dir($tmpDir . '\\word\\_rels')) mkdir($tmpDir . '\\word\\_rels', 0777, true);

file_put_contents($tmpDir . '\\[Content_Types].xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Default Extension="html" ContentType="text/html"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>');

file_put_contents($tmpDir . '\\_rels\\.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>');

file_put_contents($tmpDir . '\\word\\_rels\\document.xml.rels', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="htmlChunk1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/aFChunk" Target="chunk.html"/>
</Relationships>');

file_put_contents($tmpDir . '\\word\\chunk.html', "\xEF\xBB\xBF" . $html);

file_put_contents($tmpDir . '\\word\\document.xml', '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main"
            xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">
    <w:body>
        <w:altChunk r:id="htmlChunk1"/>
        <w:sectPr>
            <w:pgSz w:w="11906" w:h="16838"/>
            <w:pgMar w:top="1020" w:right="1020" w:bottom="1020" w:left="1020"/>
        </w:sectPr>
    </w:body>
</w:document>');

$zipPath = __DIR__ . '\\Entregable_Sesion4_UX_UI_Catfe.zip';
if (file_exists($zipPath)) unlink($zipPath);
if (file_exists($docxPath)) unlink($docxPath);
exec('powershell -NoProfile -Command "Compress-Archive -Path \'' . $tmpDir . '\\*\' -DestinationPath \'' . $zipPath . '\' -Force"');
if (file_exists($zipPath)) {
    rename($zipPath, $docxPath);
    echo "DOCX size: " . filesize($docxPath) . " bytes\n";
}
exec('cmd /c rmdir /s /q "' . $tmpDir . '"');



