<?php 
require_once __DIR__ . '/../../vendor/autoload.php';
use App\repository\ProductRepository;
$product_repository = new ProductRepository();
$products = $product_repository->GetProducts();
$uniqueProducts = array_unique(array_column($products, "product"));

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calcular MRP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php include("../views/templates/navbar.php"); ?>
    <div class="container mt-4" style="text-align: center;">
            <form id="mrp_calc_form">
                <?php foreach($uniqueProducts as $product):?>
                    <input type="text" value="<?= htmlspecialchars($product)?>" disabled>
                    <input type="number" name="quantity[<?= htmlspecialchars($product)?>]" id="quantity[<?= htmlspecialchars($product)?>]" placeholder="Quantidade" min="0" required>
                    </br>
                <?php endforeach?>
            </br> 
            <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
    </div>
    </br> 
    </br> 
    <div id="mrp-table" class="container mt-4"></div>
    <script src="../assets/js/mrp.js"></script>
  </body>
  <footer>
  </footer>
</html>
