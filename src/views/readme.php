<?php require_once __DIR__ . '/../../vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>README - Projeto MRP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/components.css">
  <link rel="stylesheet" href="../assets/css/layout.css">
</head>
<body id="readme-body">
  <?php include("../views/templates/navbar.php"); ?>

  <div class="container mt-4 mb-5">

    <div class="section-block">
      <h1> Teste para Dev JR - Projeto MRP </h1>
    </div>

    <div class="section-block">
      <h2> Tecnologias utilizadas </h2>
      <ul>
        <li>PHP v8.3.6</li>
        <li>PHP MySQL</li>
        <li>PHP Apache</li>
        <li>PHPUnit v10.5.48</li>
        <li>PHP8.3-xml</li>
        <li>PHP8.3-mbstring</li>
        <li>Composer v2.8.10</li>
        <li>MySQL v8.0.42</li>
        <li>Apache v2.4.58</li>
        <li>Bootstrap</li>
      </ul>
    </div>

    <div class="section-block">
      <h2> Setup </h2>

      <h4>PHP:</h4>
      <pre><code>sudo apt install php</code></pre>

      <h4>PHP Apache:</h4>
      <pre><code>sudo apt install libapache2-mod-php</code></pre>

      <h4>PHP MySQL:</h4>
      <pre><code>sudo apt install php-mysql</code></pre>

      <h4>PHPUnit:</h4>
      <p>Requer Composer instalado.</p>
      <pre><code>composer require --dev phpunit/phpunit ^10</code></pre>

      <h4>Extensões PHP:</h4>
      <pre><code>sudo apt install php8.3-xml
sudo apt install php8.3-mbstring</code></pre>

      <h4>Composer:</h4>
      <pre><code>php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"</code></pre>

      <h4>MySQL e Apache:</h4>
      <pre><code>sudo apt install mysql-server
sudo apt install apache2</code></pre>
    </div>

    <div class="section-block">
      <h2> Instalação </h2>
      <ol>
        <li>Clone o repositório:
          <pre><code>git clone https://github.com/ADStefano/projeto-mrp</code></pre>
        </li>
        <li>Entre na pasta:
          <pre><code>cd projeto-mrp</code></pre>
        </li>
        <li>Instale as dependências:
          <pre><code>composer install</code></pre>
        </li>
      </ol>
    </div>

    <div class="section-block">
      <h2> Configurando o banco de dados </h2>
      <p>Via terminal (na raiz do projeto):</p>
      <pre><code>mysql -u root -p < database/mrp_schema.sql
mysql -u root -p mrp < database/mrp_data.sql</code></pre>
    </div>

    <div class="section-block">
      <h2> Como executar o projeto </h2>

      <h4>Servidor interno PHP:</h4>
      <pre><code>php -S localhost:8080</code></pre>

      <h4>Com Apache:</h4>
      <pre><code>sudo mv projeto-mrp /var/www/html/
sudo chown -R www-data:www-data /var/www/html/projeto-mrp
sudo chmod -R 755 /var/www/html/projeto-mrp</code></pre>
    </div>

    <div class="section-block">
      <h2> Como usar o sistema </h2>
      <ul>
        <li><strong>Adicionar Produto:</strong> Preencha os campos de produto, componente e quantidade.</li>
        <li><strong>Atualizar Estoque:</strong> Escolha o componente e defina nova quantidade.</li>
        <li><strong>Visualizar Estoque:</strong> Tabela com todos os dados salvos.</li>
        <li><strong>Calcular MRP:</strong> Informe quantidade de produtos desejados e veja os insumos necessários.</li>
      </ul>
    </div>

    <div class="section-block">
      <h2> Estrutura do Projeto </h2>
      <pre><code>projeto-mrp/
├── composer.json
├── composer.lock
├── database/
│   ├── mrp_data.sql
│   └── mrp_schema.sql
├── index.php
├── phpunit.xml
├── README.md
├── src/
│   ├── assets/
│   ├── controllers/
│   ├── models/
│   ├── repository/
│   ├── router/
│   ├── tests/
│   └── views/
└── vendor/</code></pre>
    </div>

    <div class="section-block">
      <h2> Testes </h2>
      <p>Execute os testes com o comando:</p>
      <pre><code>./vendor/bin/phpunit</code></pre>
    </div>

  </div>
</body>
</html>
