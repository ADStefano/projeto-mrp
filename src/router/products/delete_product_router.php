<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\controllers\DeleteProduct;

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = (int) $_POST["id"] ?? null;

    $delete_product = new DeleteProduct($id);
    $deleted_product = $delete_product->Delete();

    if (!$deleted_product["success"]){
        http_response_code(500);
    }
    
    http_response_code(200);

    echo json_encode($deleted_product);

}
?>