<?php

namespace Sintierra\StorageLinkRoute\Tests\Feature;

use Sintierra\StorageLinkRoute\Tests\TestCase;


class StorageLinkRouteTest extends TestCase
{
    /** @test */
    function can_execute_storage_link_command_from_a_route()
    {
        $this->withExceptionHandling();
        $this->get('storage-link')->assertSuccessful();
    }
}