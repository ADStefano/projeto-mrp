<?php 

namespace App\tests;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\controllers\CreateProduct;

class CreateProductTest extends TestCase {

    public function testCreateProduct() {
        $createProduct = new CreateProduct("Produto teste", "Componente teste", 10);
        $result = $createProduct->Create();

        $this->assertTrue($result["success"]);
        $this->assertEquals("Produto inserido com sucesso", $result["message"]);
    }

    public function testCreateProducWithoutProduct() {
        $createProduct = new CreateProduct("", "Componente teste", 10);
        $result = $createProduct->Create();

        $this->assertFalse($result["success"]);
        $this->assertEquals("O produto é obrigatório", $result["message"]);
    }

    public function testCreateProductWithoutComponent() {
        $createProduct = new CreateProduct("Produto teste", "", 10);
        $result = $createProduct->Create();

        $this->assertFalse($result["success"]);
        $this->assertEquals("O componente é obrigatório", $result["message"]);
    }

    public function testCreateProductWithNegativeQuantity() {
        $createProduct = new CreateProduct("Produto teste", "Componente teste", -5);
        $result = $createProduct->Create();

        $this->assertFalse($result["success"]);
        $this->assertEquals("A quantidade deve ser maior que zero", $result["message"]);
    }
}   

?>