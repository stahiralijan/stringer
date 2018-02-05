<?php

namespace Stahiralijan\Stringer\Tests;

use Stahiralijan\Stringer\Facades\Stringer;
use Stahiralijan\Stringer\ServiceProvider;
use Orchestra\Testbench\TestCase;

class StringerTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'stringer' => Stringer::class,
        ];
    }

    public function testExample()
    {
        assertEquals(1, 1);
    }
}
