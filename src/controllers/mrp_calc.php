
<?php

function CalculateMRP(PDO $conn, $requirements){

    $products = GetProducts($conn);
    if(!$products){
        return "Erro ao buscar itens no banco de dados";
    }

}

?>