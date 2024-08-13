<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StorageLinkController extends Controller
{
    //
    public function createStorageLink()
    {
        try {
            File::link(
                storage_path('app/public'), public_path('storage')
            );

            return response()->json(['message' => 'Storage link created successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create storage link.', 'error' => $e->getMessage()], 500);
        }
    }
}
