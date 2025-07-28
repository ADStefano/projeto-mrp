<?php

require_once ("../config/db.php");

function UpdateProduct(PDO $conn, string $id, int $quantity){

    try{

        $query = $conn->prepare(
            "UPDATE mrp_products SET quantity = :quantity WHERE id = :id"
        );

        $query->bindParam(":id", $id, PDO::PARAM_STR);
        $query->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $query->execute();

        return "Produto atualizado com sucesso";

    } 
    catch(Exception $e){

        return "Erro ao atualizar produto no banco: ". $e->getMessage();
    }

}

?>