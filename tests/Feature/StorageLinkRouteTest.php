<?php

namespace Sintierra\StorageLinkRoute\Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Sintierra\StorageLinkRoute\Tests\TestCase;


class StorageLinkRouteTest extends TestCase
{
    /** @test */
    function can_execute_storage_link_command_from_a_route()
    {
        $this->withExceptionHandling();

        //Mock the filesystem class with a spy
        $spy = $this->spy(Filesystem::class);   

        //Asserts texts shows in route
        $this->get('storage-link')->assertSeeText('The [public/storage] directory has been linked');

        //link method with storage linked
        $spy->shouldHaveReceived('link')->with(
            storage_path('app/public'), public_path('storage')
        );

        //Exists method with public path storage
        $spy->shouldHaveReceived('exists')->with(public_path('storage'));
    }
    /** @test */
    function cannot_try_to_create_the_storage_link_twice()
    {
        //MOck the filesystem, exists method return true
        $this->mock(Filesystem::class)
             ->shouldReceive('exists')
             ->andReturn(true);

        //Asserts that see the text
        $this->get('storage-link')->assertSeeText('The public/storage directory already exists.');
    }
}