<?php 

namespace App\repository;

use PDO;
use Exception;
use App\repository\Database;

class ProductRepository{

    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function InsertProduct(string $product, string $component, int $quantity){

        $query = $this->conn->prepare(
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

    public function GetProducts(){

        try{

            $query = $this->conn->prepare(
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

    function GetComponents(string $product){
        try{

            $query = $this->conn->prepare(
                "SELECT component, quantity FROM mrp_products WHERE product = :product"
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

    public function UpdateProduct(string $id, int $quantity){

        $query = $this->conn->prepare(
            "UPDATE mrp_products SET quantity = :quantity WHERE id = :id"
        );

        $query->bindParam(":id", $id, PDO::PARAM_STR);
        $query->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $query->execute();

        return "Produto atualizado com sucesso";

    }

    public function DeleteProduct(int $id){

        $query = $this->conn->prepare(
            "DELETE FROM mrp_products WHERE id = :id"
        );

        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();

        return "Produto deletado com sucesso";

    }
}
?>