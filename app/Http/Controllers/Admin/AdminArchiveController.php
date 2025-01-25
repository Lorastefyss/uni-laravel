<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Storage;

class AdminArchiveController extends Controller
{
    public function destroy(Archive $archive)
    {
        Storage::disk('public')->delete($archive->file_name);
        $archive->delete();

        return back()->with('success', 'File deleted successfully.');
    }
}
