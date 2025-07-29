<?php

namespace App\tests;

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\controllers\MRP;

class MRPTest extends TestCase {

    public function testCalculateMRP() {
        $_POST["quantity"] = [
            "bicicleta" => 2,
            "computador" => 3
        ];

        $mrp = new MRP(2, 3);
        $result = $mrp->CalculateMRP();

        $this->assertIsString($result);
        $this->assertStringContainsString("<table class='table table-bordered'>",$result);
    }

    public function testCalculateMRPWithNoQuantities() {
        $_POST["quantity"] = [];

        $mrp = new \App\controllers\MRP(0, 0);
        $result = $mrp->CalculateMRP();

        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }
}

?>