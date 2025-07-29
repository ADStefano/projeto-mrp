<?php

namespace App\controllers;
use App\repository\ProductRepository;
use Exception;

class UpdateProduct{

    public $id;
    public $quantity;
    private $product_repository;

    public function __construct(int $id, int $quantity){
        $this->id = $id;
        $this->quantity = $quantity;
        $this->product_repository = new ProductRepository();
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
                "message" => "A quantidade deve ser maior que zero"
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