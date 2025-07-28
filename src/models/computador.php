<?php

class Computador{

    public $memoria_ram = 0;
    public $gabinete = 0;
    public $placa_mae = 0;

    public function __construct(PDO $conn){
        $this->GetComponents($conn);
    }

    // Passa os dados do banco para as propriedades do objeto
    private function GetComponents(PDO $conn){
        $components = GetComponents($conn, "computador");
        foreach ($components as $component){
            switch ($component["component"]) {
                case 'memoria_ram':
                    $this->memoria_ram = $component["quantity"];
                    break;
                case 'gabinete':
                    $this->gabinete = $component["quantity"];
                    break;
                case 'placa_mae':
                    $this->placa_mae = $component["quantity"];
                    break;
            }
        }
    }

    // Calcula os componentes necessários para montar um computador e retorna uma lista com tres objetos,
    // $req são os componentes necessários, $stock são os componentes que já tem, $need é a diferença entre $req e $stock
    // e $all é a lista com os dois
    public function CalNumComponents(int $numComputadores){
        $memoria_ramNec = $numComputadores * 2;
        $gabineteNec = $numComputadores;
        $placa_maeNec = $numComputadores;

        $memoria_ramToBuy = abs($this->memoria_ram - $memoria_ramNec);
        $gabineteToBuy = abs($this->gabinete - $gabineteNec);
        $placa_maeToBuy = abs($this->placa_mae - $placa_maeNec);



        $req = ["memoria_ram" => $memoria_ramNec, "gabinete" => $gabineteNec, "placa_mae" => $placa_maeNec];
        $stock = ["memoria_ram" => $this->memoria_ram, "gabinete" => $this->gabinete, "placa_mae" => $this->placa_mae];
        $need = ["memoria_ram" => $memoria_ramToBuy, "gabinete" => $gabineteToBuy, "placa_mae" => $placa_maeToBuy];
        $all = ["req" => $req, "stock" => $stock, "need" => $need];

        return $all;
    }
}
?>