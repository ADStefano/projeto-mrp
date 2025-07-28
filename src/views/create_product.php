
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserir Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php include("../views/templates/navbar.php"); ?>
    <div class="container mt-4">
        <div style="text-align: center;">
            <form id="create_product_form">
                <input type="text" name="product" placeholder="Nome do produto" required>
                <input type="text" name="component" placeholder="Nome do componente" required>
                <input type="number" name="quantity" placeholder="Quantidade" min="0" required>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="../assets/js/create_product.js"></script>
  </body>
  <footer>
  </footer>
</html>

