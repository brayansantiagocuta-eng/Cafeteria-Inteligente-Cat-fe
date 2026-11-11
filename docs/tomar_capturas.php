<?php
$edge = 'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe';
$outDir = 'C:\xampp\htdocs\Cat-fé\docs\capturas';
if (!is_dir($outDir)) mkdir($outDir, 0777, true);

$screens = [
    ['name' => '01_login.png',       'view' => 'login',       'w' => 1440, 'h' => 900],
    ['name' => '02_dashboard.png',   'view' => 'dashboard',   'w' => 1440, 'h' => 900],
    ['name' => '03_mesas.png',       'view' => 'mesas',       'w' => 1440, 'h' => 950],
    ['name' => '04_inventario.png',  'view' => 'inventario',  'w' => 1440, 'h' => 950],
    ['name' => '05_menu.png',        'view' => 'menu',        'w' => 1440, 'h' => 900],
    ['name' => '06_listados.png',    'view' => 'listados',    'w' => 1440, 'h' => 900],
    ['name' => '07_formularios.png', 'view' => 'formularios', 'w' => 1440, 'h' => 900],
    ['name' => '08_detalle.png',     'view' => 'detalle',     'w' => 1440, 'h' => 900],
    ['name' => '09_modal_toast.png', 'view' => 'modal',       'w' => 1440, 'h' => 900],
    ['name' => '10_reportes.png',    'view' => 'reportes',    'w' => 1440, 'h' => 900],
    ['name' => '11_validacion.png',  'view' => 'error',       'w' => 1440, 'h' => 900],
    ['name' => '12_mobile_resp.png', 'view' => 'mobile',      'w' => 390,  'h' => 844]
];

foreach ($screens as $s) {
    $file = $outDir . '\\' . $s['name'];
    if (file_exists($file) && filesize($file) > 10000) {
        echo "Ya existe: {$s['name']}\n";
        continue;
    }
    $url = 'http://localhost/Cat-f%C3%A9/public/index.php?view=' . $s['view'];
    $cmd = '"' . $edge . '" --headless=new --disable-gpu --no-sandbox --hide-scrollbars --window-size=' . $s['w'] . ',' . $s['h'] . ' --screenshot="' . $file . '" "' . $url . '" 2>&1';
    echo "Capturando: {$s['name']}...\n";
    exec($cmd);
}
echo "Finalizado.\n";
