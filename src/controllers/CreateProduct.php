<?php

namespace App\controllers;
use App\repository\ProductRepository;
use Exception;

class CreateProduct{

    public $product;
    public $component;
    public $quantity;
    private $product_repository;

    public function __construct(string $product, string $component, int $quantity){
        $this->product = $product;
        $this->component = $component;
        $this->quantity = $quantity;
        $this->product_repository = new ProductRepository();

    }

    public function Create(){

        if (!$this->product){
            return [
                "success" => false,
                "message" => "O produto é obrigatório"
            ];
        } else if (!$this->component){
            return [
                "success" => false,
                "message" => "O componente é obrigatório"
            ];
        } else if ($this->quantity < 0){
            return [
                "success" => false,
                "message" => "A quantidade deve ser maior que zero"
            ];
        }

        try{
            $result = $this->product_repository->InsertProduct($this->product, $this->component, $this->quantity);

            return [
                "success" => true,
                "message" => $result
            ];
        }
        catch(Exception $e){
            return [
                "success" => false,
                "message" => "Erro ao salvar produto: $this->product, $this->component no banco: ". $e->getMessage()
            ];
        }
    }
}
?>


