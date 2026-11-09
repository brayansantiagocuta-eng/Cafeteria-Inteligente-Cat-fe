<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'mesas':
        echo json_encode([
            "success" => true,
            "data" => [
                ["id" => 1, "numero" => 1, "capacidad" => 4, "estado" => "DISPONIBLE"],
                ["id" => 2, "numero" => 2, "capacidad" => 2, "estado" => "OCUPADA"],
                ["id" => 3, "numero" => 3, "capacidad" => 4, "estado" => "DISPONIBLE"],
                ["id" => 4, "numero" => 4, "capacidad" => 6, "estado" => "POR_COBRAR"],
                ["id" => 5, "numero" => 5, "capacidad" => 2, "estado" => "DISPONIBLE"]
            ]
        ]);
        break;

    case 'productos':
        echo json_encode([
            "success" => true,
            "data" => [
                ["id" => 1, "nombre" => "Capuchino Especial Cat-fé", "categoria" => "Cafetería", "precio" => 8500.0, "stock" => 25],
                ["id" => 2, "nombre" => "Espresso Doble Star-Light", "categoria" => "Cafetería", "precio" => 6000.0, "stock" => 40],
                ["id" => 3, "nombre" => "Latte Vainilla Felino", "categoria" => "Cafetería", "precio" => 9000.0, "stock" => 18],
                ["id" => 4, "nombre" => "Cheesecake de Arándanos", "categoria" => "Repostería", "precio" => 12000.0, "stock" => 8],
                ["id" => 5, "nombre" => "Croissant de Almendras", "categoria" => "Repostería", "precio" => 7500.0, "stock" => 0]
            ]
        ]);
        break;

    case 'comanda':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            if (!empty($input['mesa_id']) && !empty($input['items'])) {
                echo json_encode([
                    "success" => true,
                    "message" => "Comanda enviada a barra exitosamente",
                    "comanda_id" => rand(100, 999),
                    "total" => $input['total'] ?? 0.0
                ]);
            } else {
                http_response_code(400);
                echo json_encode(["success" => false, "message" => "Datos de comanda incompletos"]);
            }
        }
        break;

    default:
        echo json_encode([
            "sistema" => "Cat-fé API REST",
            "version" => "1.0",
            "endpoints" => [
                "GET ?action=mesas",
                "GET ?action=productos",
                "POST ?action=comanda"
            ]
        ]);
        break;
}
