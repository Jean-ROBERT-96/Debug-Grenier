<?php

namespace App\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Cities;



class CitiesTest extends TestCase {

    /** @test */
    public function search() {
        $result = Cities::search('nice');
        fwrite(STDOUT, print_r($result, TRUE));
        $this->assertGreaterThan(0, count($result));
    }
}
