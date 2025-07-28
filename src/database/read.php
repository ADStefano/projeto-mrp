<?php

require_once ('../config/db.php');

function GetProducts(PDO $conn){

    try{

        $query = $conn->prepare(
            "SELECT * FROM mrp_products"
            );

        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_ASSOC);

        return $products;

    } 
    catch(Exception $e){

        echo "Erro ao buscar produtos no banco: ". $e->getMessage();
        return [];
    }

}

function GetComponents(PDO $conn, string $product){
    try{

        $query = $conn->prepare(
            "SELECT component, quantity FROM mrp_products WHERE product = ':product'"
        );
        $query->bindParam(":product", $product);
        $query->execute();
        $components = $query->fetchAll(PDO::FETCH_ASSOC);

        return $components;

    }
    catch(Exception $e){
        echo "Erro ao buscar componentes no banco: ". $e->getMessage();
        return [];
    }
}

?>