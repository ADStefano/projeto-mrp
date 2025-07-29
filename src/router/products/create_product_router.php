<?php

require_once __DIR__ . "/../../repository/db.php";
require_once __DIR__ . "/../../controllers/create_product_controller.php";
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $product = (string) $_POST["product"] ?? null;
    $component = (string) $_POST["component"] ?? null;
    $quantity = (int )$_POST["quantity"] ?? 0;

    $create_product = new CreateProduct($conn, $product, $component, $quantity);
    $created_product = $create_product->Create();

    if (!$created_product["success"]){
        http_response_code(500);
    }
    
    http_response_code(200);

    echo json_encode($created_product);

}
?>


