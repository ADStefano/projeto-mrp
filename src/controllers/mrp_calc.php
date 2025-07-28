
<?php

require_once("../models/bicicleta.php");
require_once("../models/computador.php");
require_once ("../config/db.php");

function CalculateMRP(PDO $conn, int $reqBic, int $reqPc){

    $bicicletas = new Bicicleta($conn);
    $computadores = new Computador($conn);

    list($bicReq, $bicStock, $bicNeed) = $bicicletas->CalNumComponents($reqBic);
    list($pcReq, $pcStock, $pcNeed) = $computadores->CalNumComponents($reqPc);

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

$quantities = $_POST['quantity'] ?? [];
$reqBic = isset($quantities['bicicleta']) ? (int)$quantities['bicicleta'] : 0;
$reqPc = isset($quantities['computador']) ? (int)$quantities['computador'] : 0;

echo CalculateMRP($conn, $reqBic, $reqPc);

?>

