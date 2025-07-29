<?php

namespace App\tests;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\controllers\UpdateProduct;

class UpdateProductTest extends TestCase {

    public function testUpdateProduct() {
        $updateProduct = new UpdateProduct(1, 5);
        $result = $updateProduct->Update();

        $this->assertTrue($result["success"]);
        $this->assertEquals("Produto atualizado com sucesso", $result["message"]);
    }

    public function testUpdateProductWithNegativeQuantity() {
        $updateProduct = new UpdateProduct(1, -3);
        $result = $updateProduct->Update();

        $this->assertFalse($result["success"]);
        $this->assertEquals("A quantidade deve ser maior que zero", $result["message"]);
    }
}

?>