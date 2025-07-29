<?php

namespace App\controllers;
use App\repository\ProductRepository;
use Exception;

class DeleteProduct{

    public $id;
    private $product_repository;

    public function __construct(int $id){
        $this->id = $id;
        $this->product_repository = new ProductRepository();
    }

    public function Delete(){
        if (!$this->id){
            return [
                "success" => false,
                "message" => "O ID é obrigatório"
            ];
        }

        try{

            $result = $this->product_repository->DeleteProduct($this->id);

            return [
                "success" => true,
                "message" => $result
            ];
        }
        catch (Exception $e){
            return [
                "success" => false,
                "message" => "Erro ao deletar o produto: $this->id, Erro: ". $e->getMessage()
            ];

        }
    }
    
}
?>