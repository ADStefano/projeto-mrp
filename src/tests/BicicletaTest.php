<?php 

namespace App\tests;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\models\Bicicleta;

class BicicletaTest extends TestCase {

    public function testCalNumComponents() {
        $bicicleta = new Bicicleta();
        $numBicicletas = 5;
        $result = $bicicleta->CalNumComponents($numBicicletas);

        $this->assertIsArray($result);
        $this->assertCount(3, $result);
        $this->assertArrayHasKey('roda', $result[0]);
        $this->assertArrayHasKey('quadros', $result[0]);
        $this->assertArrayHasKey('guidao', $result[0]);
    }
}

?>