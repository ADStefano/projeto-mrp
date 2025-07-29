<?php 

require_once __DIR__ . "/../../repository/db.php";
require_once __DIR__ . "/../../controllers/mrp_calc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $quantities = $_POST['quantity'] ?? [];
    $reqBic = isset($quantities['bicicleta']) ? (int)$quantities['bicicleta'] : 0;
    $reqPc = isset($quantities['computador']) ? (int)$quantities['computador'] : 0;

    $mrp = new MRP($conn, $reqBic, $reqPc);

    echo $mrp->CalculateMRP();

}
?>