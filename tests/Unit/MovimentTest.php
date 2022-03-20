<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\services\Movement\MovementService;

class MovimentTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMovimentTest()
    {
        $service = new MovementService();
        $data =  $service->getMovements(['id' => 1]);
        $this->assertCount(1,$data);
    }
}
