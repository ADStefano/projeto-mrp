<?php

require_once __DIR__ . "/../repository/db.php";
require_once __DIR__ . "/../repository/product_repository.php";

class UpdateProduct{

    public $id;
    public $quantity;
    private $product_repository;

    public function __construct(PDO $conn, int $id, int $quantity){
        $this->id = $id;
        $this->quantity = $quantity;
        $this->product_repository = new ProductRepository($conn);
    }

    public function Update(){
        if (!$this->id){
            return [
                "success" => false,
                "message" => "O produto é obrigatório"
            ];

        } else if ($this->quantity < 0){
            return [
                "success" => false,
                "message" => "Quantidade deve ser maior que zero"
            ];
        }

        try{

            $result = $this->product_repository->UpdateProduct($this->id, $this->quantity);

            return [
                "success" => true,
                "message" => $result
            ];
        }
        catch (Exception $e){
            return [
                "success" => false,
                "message" => "Erro ao atualizar produto: $this->id, Erro: ". $e->getMessage()
            ];

        }
    }
    
}
?>