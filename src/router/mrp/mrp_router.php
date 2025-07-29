<?php 

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\controllers\MRP;


if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $quantities = $_POST["quantity"] ?? [];
    $reqBic = isset($quantities["bicicleta"]) ? (int)$quantities["bicicleta"] : 0;
    $reqPc = isset($quantities["computador"]) ? (int)$quantities["computador"] : 0;

    $mrp = new MRP($reqBic, $reqPc);

    echo $mrp->CalculateMRP();

}
?>