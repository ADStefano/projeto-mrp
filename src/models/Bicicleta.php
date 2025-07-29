<?php

namespace App\models;
use App\repository\ProductRepository;


class Bicicleta{

    public $roda = 0;
    public $quadro = 0;
    public $guidao = 0;
    private $product_repository;

    public function __construct(){
        $this->SetComponentsProperty();
    }

    // Passa os dados do banco para as propriedades do objeto
    private function SetComponentsProperty(){
        $this->product_repository = new ProductRepository();
        $components = $this->product_repository->GetComponents("bicicleta");
        foreach ($components as $component){
            switch ($component["component"]) {
                case "roda":
                    $this->roda = $component["quantity"];
                    break;
                case "guidao":
                    $this->guidao = $component["quantity"];
                    break;
                case "quadro":
                    $this->quadro = $component["quantity"];
                    break;
            }
        }
    }

    // Calcula os componentes necessários para montar uma bicicleta e retorna uma lista com tres objetos,
    // $req são os componentes necessários, $stock são os componentes que já tem, $need é a diferença entre $req e $stock
    public function CalNumComponents(int $numBicicletas){
        $rodaNec = $numBicicletas * 2;
        $quadrosNec = $numBicicletas;
        $guidaoNec = $numBicicletas;

        $rodaToBuy = abs($this->roda - $rodaNec);
        $rodaToBuy = ($rodaToBuy < $this->roda) ? 0 : $rodaToBuy;
        $quadroToBuy = abs($this->quadro - $quadrosNec);
        $quadroToBuy = ($quadroToBuy < $this->quadro) ? 0 : $quadroToBuy;
        $guidaoToBuy = abs($this->guidao - $guidaoNec);
        $guidaoToBuy = ($guidaoToBuy < $this->guidao) ? 0 : $guidaoToBuy;



        $req = ["roda" => $rodaNec, "quadros" => $quadrosNec, "guidao" => $guidaoNec];
        $stock = ["roda" => $this->roda, "quadros" => $this->quadro, "guidao" => $this->guidao];
        $need = ["roda" => $rodaToBuy, "quadros" => $quadroToBuy, "guidao" => $guidaoToBuy];

        return array($req, $stock, $need);
    }
}
?>