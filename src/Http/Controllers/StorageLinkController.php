<?php

namespace Sintierra\StorageLinkRoute\Http\Controllers;

use Illuminate\Filesystem\Filesystem;

class StorageLinkController
{
    public function __invoke(Filesystem $filesystem)
    {
        //Verifies that storage exists in public path
        if($filesystem->exists(public_path('storage'))) {
            return 'The public/storage directory already exists.'; 
        }

        //Links the storage_path of the app with public_path in folder
        $filesystem->link(
            storage_path('app/public'), public_path('storage')
        );

        return "The [public/storage] directory has been linked";
    }
}