
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserir Produto</title>
    <link rel="stylesheet" href="../assets/css/components.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php include("../views/templates/navbar.php"); ?>
    <div class="container mt-4">
        <div style="text-align: center;">
            <form id="create_product_form">
              <div class="form-group">
                <label for="product"> Produto </label>
                <input type="text" id="product" name="product" class="form-control" placeholder="Nome do produto" required>
              </div>
              </br>
              <div class="form-group">
                <label for="component"> Componente </label>
                <input type="text" id="component" name="component" class="form-control" placeholder="Nome do componente" required>
              </div>
              </br>
              <div class="form-group">
                <label for="quantity"> Quantidade </label>
                <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Quantidade" min="0" required>
              </div>
                <div class="form-text text-muted"> Em caso de componentes duplicados o valor será atualizado </div>
                </br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <div id="notification"></div>
        </div>
    </div>
    <script type="module" src="../assets/js/create_product.js"></script>
  </body>
  <footer>
  </footer>
</html>

