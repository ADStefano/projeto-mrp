<?php

// header('Content-Type: application/json');
require_once ('../database/update.php');

// ALTERAR PARA PUT
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;
    $quantity = $_POST['quantity'] ?? null;

    if (!$id || !$quantity){
        echo "O produto é obrigatório";
        exit;
    } else if ($quantity < 0){
        echo "Quantidade deve ser maior que zero";
        exit;
    }

    if ($id && $quantity){
        $result = UpdateProduct($conn, $id, $quantity);
        echo json_encode([
            "message " => $result
        ]);
    }
}
?>