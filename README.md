# Teste para Dev JR - Projeto MRP

## Tecnologias utilizadas:
* PHP v8.3.6
* PHP MySQL
* PHP Apache
* PHPUnit v10.5.48
* PHP8.3-xml
* PHP8.3-mbstring
* Composer v2.8.10
* MySQL v8.0.42
* Apache v2.4.58
* Bootstrap

## Setup:

### PHP:
```
sudo apt install php
```

### PHP Apache:
``` 
sudo apt install libapache2-mod-php 
```

### PHP MySQL:
``` 
sudo apt install php-mysql 
```

### PHPUnit:
É necessário ter o composer instalado.
``` 
composer require --dev phpunit/phpunit ^10 
```

### PHP8.3-xml:
``` 
sudo apt install php8.3-xml 
```

### PHP8.3-mbstring:
``` 
sudo apt-get install php8.3-mbstring 
```

### Composer:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

### MySQL:
``` 
sudo apt install mysql-server 
```

### Apache:
``` 
sudo apt install apache2 
```

## Instalação:

1. Clone o repositório: 
```
git clone https://github.com/ADStefano/projeto-mrp
```
2. Navegue até o diretório do projeto: 
``` 
cd projeto-mrp 
```
3. Instale as dependências com o composer: 
``` 
composer install 
```

## Configurando o banco de dados:
Para configurar o banco pode se utilizar o MySQL Workbench caso já tenha instalado ou rodar o seguinte comando:
``` 
mysql -u root -p < database/mrp_schema.sql \
&& mysql -u root -p mrp < database/mrp_data.sql
```
 deve estar dentro da pasta raiz do projeto(projeto-mrp), caso utilize outro usuário só alterar o -u root para -u seu-usuário.

## Como executar o projeto:
É possível executar o projeto tanto pelo servidor interno do PHP, quanto pelo Apache. Caso utilize o apache deve mover o projeto para dentro da pasta ```/var/www/html ```, que é o root directory.

Servidor interno PHP:
``` 
psp -S localhost:8080 
```
Servidor Apache:

Mova a pasta com:
```
sudo mv projeto-mrp /var/www/html/

```
Caso esteja fora da pasta projeto-mrp, coloque o caminho inteiro:
```
sudo mv /seu-diretório/projeto-mrp /var/www/html/

```
Após mover a pasta para o diretório correto é necessário dar as permissões para o Apache:
```
sudo chown -R www-data:www-data /var/www/html/projeto-mrp
sudo chmod -R 755 /var/www/html/projeto-mrp
```

## Como usar o sistema:
O sistema é bem simples, na página inicial há um botão HOME que redireciona para o index e as quatro opções de ações possíveis, Adicionar um produto ao estoque, atualizar um produto do estoque, visualizar os produtos em estoque e fazer o cálculo MRP.

### Adicionar um produto ao estoque:
Esta página contém 3 elementos de formulário, Produto, Componente e Quantidade, deve preencher os três para adicionar o produto no banco, se o componente for repetido a quantidade vai ser atualizada.

### Atualizar a quantidade de um produto no estoque:
Esta página contém um seletor com os componentes disponíveis no estoque e um formulário que recebe a quantidade de componentes para atualizar no estoque.

### Visualizar estoque:
Esta página contém uma tabela com todos os produtos e componentes do estoque, mostrando a quantidade total.

### Calcular MRP:
Esta página tem um formulário que recebe a quantidade de produtos a ser montados, depois de preencher o formulário e enviar uma tabela será retornada com os campos: Produto, Componente, Necessário, Em estoque e Faltando.
O campo necessário representa quantos componentes são necessários para montar a quantidade de produtos inserida no formulário.
O campo Em estoque mostra a quantidade de componentes em estoque.
O campo Faltando mostra quantos componentes faltam para montar a quantidade de produtos inserida na tabela, caso não haja componentes o suficiente, a célula ficará vermelha, caso haja o suficiente, a célula ficará verde e mostrará a quantidade como 0.

## Estrutura do projeto:

```
projeto-mrp
├── composer.json
├── composer.lock
├── database
│   ├── mrp_data.sql
│   └── mrp_schema.sql
├── index.php
├── phpunit.xml
├── README.md
├── .gitignore
└── src
    ├── assets
    ├── controllers
    ├── models
    ├── repository
    ├── router
    ├── tests
    └── views

```

### Explicação da estrutura:
* index.php: É o ponto de entrada do projeto.
* phpunit.xml: Configuração dos testes.
* README.md: O README do projeto que você está lendo.
* .gitignore: Impede que os arquivos nomeados dentro dele sejam enviados ao github.
* composer.json: Gerencia as dependências do projeto.
* composer.lock: Garante que as dependências tenham as mesmas versões.
* database: Diretório com o schema e insert de dados para o MySQL.
* src: Diretório com o código fonte do projeto.
* src/assets: Contém o frontend do projeto, como o css e o Javascript.
* src/controllers: Contém os controllers que lidam com o fluxo da aplicação.
* src/models: Contém os modelos dos produtos(bicicleta/computador).
* src/repository: Contém as classes responsáveis por conectar e executar queries no banco de dados.
* src/router: Roteiam as requisições e chamam os controllers.
* src/tests: Contém os testes das classes e suas funções.
* src/views: Contém a outra parte do frontend, arquivos html e templates html.

OBS: O vendor não está no github por ser muito extenso, e também o composer cria quando você instala.

## Testes:
O projeto contém testes para as classes principais, para rodar os teste utilize este comando:
```
./vendor/bin/phpunit
```