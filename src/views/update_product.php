<?php 
include("../views/templates/navbar.php");
require_once ('../database/read.php');
$products = GetProducts($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
        <div style="text-align: center;">
            <form method="POST" action="../controllers/update_product.php">
                <select name="id" required>
                    <?php foreach($products as $product):?>
                        <option value="<?= htmlspecialchars($product['id']) ?>">
                            <?= htmlspecialchars($product['component']) ?>
                        </option>
                    <?php endforeach?>
                </select>
            <input type="number" name="quantity" placeholder="Quantidade" min="0" required>
            <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
  <footer>
  </footer>
</html>

