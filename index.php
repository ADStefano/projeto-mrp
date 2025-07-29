<?php

require_once __DIR__ . '/vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto MRP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
<body>
    <?php include("../projeto-mrp/src/views/templates/navbar.php"); ?>
</br>
    <div class="container">
        <div class="d-grid gap-2">
          <a href="src/views/create_product_view.php" class="btn btn-primary text-center">Adicionar Produtos</a>
        </div>
        </br>
        <div class="d-grid gap-2">
          <a href="src/views/update_product_view.php" class="btn btn-primary text-center">Atualizar estoque</a>
        </div>
        </br>
        <div class="d-grid gap-2">
          <a href="src/views/view_products_view.php" class="btn btn-primary text-center">Visualizar estoque</a>
        </div>
        </br>
        <div class="d-grid gap-2">
          <a href="src/views/mrp_view.php" class="btn btn-primary text-center">Calcular MRP</a>
        </div>
    </div>
</body>
</html>

