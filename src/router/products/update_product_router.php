<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\controllers\UpdateProduct;

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = (int) $_POST["id"] ?? null;
    $quantity = (int) $_POST["quantity"] ?? null;

    $update_product = new UpdateProduct($id, $quantity);
    $updated_product = $update_product->Update();

    if (!$updated_product["success"]){
        http_response_code(500);
    }
    
    http_response_code(200);

    echo json_encode($updated_product);

}
?>