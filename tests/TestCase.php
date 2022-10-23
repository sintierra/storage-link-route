<?php

namespace Sintierra\StorageLinkRoute\Tests;

use Sintierra\StorageLinkRoute\StorageLinkRouteServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [StorageLinkRouteServiceProvider::class];
    }
}