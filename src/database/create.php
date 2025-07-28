<?php

require_once ("../config/db.php");

function CreateProduct(PDO $conn, string $product, string $component, int $quantity){

    try{

        $query = $conn->prepare(
            "INSERT INTO mrp_products (product, component, quantity)
            VALUES (:product, :component, :quantity)
            ON DUPLICATE KEY UPDATE quantity = :quantity_update"
            );

        $query->bindParam(":product", $product, PDO::PARAM_STR);
        $query->bindParam(":component", $component, PDO::PARAM_STR);
        $query->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $query->bindParam(":quantity_update", $quantity, PDO::PARAM_INT);
        $query->execute();

        return "Produto inserido com sucesso";

    } 
    catch(Exception $e){

        return "Erro ao salvar produto no banco: ". $e->getMessage();
    }

}

?>