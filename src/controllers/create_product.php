<?php

require_once ('../database/create.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product = $_POST['product'] ?? null;
    $component = $_POST['component'] ?? null;
    $quantity = $_POST['quantity'] ?? 0;

    if (!$product){
        echo "Produto é obrigatório";
        exit;
    } else if (!$component){
        echo "Componente é obrigatório";
        exit;
    } else if ($quantity < 0){
        echo "Quantidade deve ser maior que zero";
        exit;
    }

    $result = CreateProduct($conn, $product, $component, $quantity);
    echo json_encode([
        "message " => $result
    ]);

}
?>


