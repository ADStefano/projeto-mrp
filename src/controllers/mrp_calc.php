
<?php

require_once __DIR__ . "/../repository/db.php";
require_once __DIR__ . "../../models/bicicleta.php";
require_once __DIR__ . "../../models/computador.php";

class MRP{

    public $reqBic;
    public $reqPc;
    public $bicicleta;
    public $computador;

    public function __construct(PDO $conn, int $reqBic, int $reqPc){
        $this->reqBic = $reqBic;
        $this->reqPc = $reqPc;
        $this->bicicleta = new Bicicleta($conn);
        $this->computador = new Computador($conn);
    }

    public function CalculateMRP(){

        list($bicReq, $bicStock, $bicNeed) = $this->bicicleta->CalNumComponents($this->reqBic);
        list($pcReq, $pcStock, $pcNeed) = $this->computador->CalNumComponents($this->reqPc);

        $tabela = "
        <table>
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

            $tabela .= "
            <tr>
                <td> Bicicleta </td>
                <td> $bicComp </td>
                <td> $bicReq[$bicComp] </td>
                <td> $bicStock[$bicComp] </td>
                <td> $bicNeed[$bicComp] </td>
            </tr>
            ";
        }

        foreach ($pcReq as $pcComp => $qnt){
            $tabela .= "
            <tr>
                <td> Computador </td>
                <td> $pcComp </td>
                <td> $pcReq[$pcComp] </td>
                <td> $pcStock[$pcComp] </td>
                <td> $pcNeed[$pcComp] </td>
            </tr>
            ";
        }

        $tabela .= "</tbody></table>";

        return $tabela;
    }
}
?>

