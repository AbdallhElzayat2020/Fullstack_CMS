<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait FileUploadTrait
{


    public function handleFileUpload(Request $request, $fileName, $oldPath = null, $dir = 'uploads'): ?string
    {
        if (!$request->hasFile($fileName)) {
            return null;
        }

        if ($oldPath && File::exists(public_path($oldPath))) {
            File::delete(public_path($oldPath));
        }

        $file = $request->file($fileName);
        $extension = $file->getClientOriginalExtension();
        $updateFileName = Str::random(30) . '.' . $extension;
        $file->move(public_path($dir), $updateFileName);
        return $dir . '/' . $updateFileName; //uploads/image.jpg
    }


}
