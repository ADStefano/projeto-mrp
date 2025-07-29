<?php

namespace App\tests;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\models\Computador;

class ComputadorTest extends TestCase {

    public function testCalNumComponents() {
        $computador = new Computador();
        $numComputadores = 3;
        $result = $computador->CalNumComponents($numComputadores);

        $this->assertIsArray($result);
        $this->assertCount(3, $result);
        $this->assertArrayHasKey('gabinete', $result[0]);
        $this->assertArrayHasKey('placa_mae', $result[0]);
        $this->assertArrayHasKey('memoria_ram', $result[0]);
    }
}

?>