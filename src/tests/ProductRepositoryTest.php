<?php

namespace App\tests;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\repository\ProductRepository;

class ProductRepositoryTest extends TestCase {

    public function testGetComponents() {
        $productRepository = new ProductRepository();
        $result = $productRepository->GetComponents("componente_teste");

        $this->assertIsArray($result);
    }

    public function testUpdateProduct() {
        $productRepository = new ProductRepository();
        $result = $productRepository->UpdateProduct(1,1);

        $this->assertEquals("Produto atualizado com sucesso", $result);
    }

    public function testDeleteProduct() {
        $productRepository = new ProductRepository();
        $result = $productRepository->DeleteProduct(1);

        $this->assertEquals("Produto deletado com sucesso", $result);
    }
}


?>