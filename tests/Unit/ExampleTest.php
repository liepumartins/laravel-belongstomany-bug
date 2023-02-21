<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    use InteractsWithSession;
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

}
