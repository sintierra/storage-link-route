<?php

use Illuminate\Support\Facades\Route;
use Sintierra\StorageLinkRoute\Http\Controllers\StorageLinkController;

Route::get('storage-link', StorageLinkController::class);