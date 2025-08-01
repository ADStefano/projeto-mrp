<?php 
require_once __DIR__ . '/../../vendor/autoload.php';
use App\repository\ProductRepository;
$product_repository = new ProductRepository();
$products = $product_repository->GetProducts();

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="../assets/css/components.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php include("../views/templates/navbar.php"); ?>
    <div class="container mt-4">
        <div style="text-align: center;">
            <form id="update_product_form">
              <div class="d-grid gap-2">
                <select name="id" required>
                    <?php foreach($products as $product):?>
                        <option value="<?= htmlspecialchars($product["id"]) ?>">
                            <?= htmlspecialchars($product["component"]) ?>
                        </option>
                    <?php endforeach?>
                </select>
              </div>
              </br>
            <div class="d-grid gap-2">
            <input type="number" name="quantity" placeholder="Quantidade" min="0" required>
            </div>
            </br>
            <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
      </br>
      <div id="notification"></div>
    </div>
    <script type="module" src="../assets/js/update_product.js"></script>
  </body>
  <footer>
  </footer>
</html>

