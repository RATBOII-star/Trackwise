<?php

namespace Tests\App;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class WelcomePageTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testHomePage(): void
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('Welcome');
    }
}
