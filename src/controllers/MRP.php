<?php
namespace App\controllers;
use App\models\Bicicleta;
use App\models\Computador;


class MRP{

    public $reqBic;
    public $reqPc;
    public $bicicleta;
    public $computador;

    public function __construct(int $reqBic, int $reqPc){
        $this->reqBic = $reqBic;
        $this->reqPc = $reqPc;
        $this->bicicleta = new Bicicleta();
        $this->computador = new Computador();
    }

    public function CalculateMRP(){

        // Como o teste é apenas para bicicletas e computadores, não há necessidade de verificar outros produtos,
        // mas seria possível colocar outros produtos também o calculo seria o mesmo
        list($bicReq, $bicStock, $bicNeed) = $this->bicicleta->CalNumComponents($this->reqBic);
        list($pcReq, $pcStock, $pcNeed) = $this->computador->CalNumComponents($this->reqPc);

        $tabela = "
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Componente</th>
                    <th>Necessário</th>
                    <th>Em Estoque</th>
                    <th>Faltando</th>
                </tr>
            </thead>
            <tbody>
        ";

        //FIXME for pela len do array?
        foreach ($bicReq as $bicComp => $qnt){
            $classe = ($bicNeed[$bicComp] > 0) ? 'table-danger' : 'table-success';

            $tabela .= "
            <tr>
                <td> Bicicleta </td>
                <td> $bicComp </td>
                <td> $bicReq[$bicComp] </td>
                <td> $bicStock[$bicComp] </td>
                <td class='$classe'> $bicNeed[$bicComp] </td>
            </tr>
            ";
        }

        foreach ($pcReq as $pcComp => $qnt){
            $classe = ($pcNeed[$pcComp] > 0) ? 'table-danger' : 'table-success';

            $tabela .= "
            <tr>
                <td> Computador </td>
                <td> $pcComp </td>
                <td> $pcReq[$pcComp] </td>
                <td> $pcStock[$pcComp] </td>
                <td class='$classe'> $pcNeed[$pcComp] </td>
            </tr>
            ";
        }

        $tabela .= "</tbody></table>";

        return $tabela;
    }
}
?>

