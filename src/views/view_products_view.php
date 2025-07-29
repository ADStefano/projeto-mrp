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
    <title>Visualizar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php include("../views/templates/navbar.php"); ?>
  </br>
    <div style="width:800px; margin:0 auto;margin-bottom: 50px;">
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Componente</th>
                    <th>Quantidade no estoque</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product["id"]); ?></td>
                    <td><?php echo htmlspecialchars($product["product"]); ?></td>
                    <td><?php echo htmlspecialchars($product["component"]); ?></td>
                    <td><?php echo htmlspecialchars($product["quantity"]); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
  </body>
  <footer>
  </footer>
</html>

