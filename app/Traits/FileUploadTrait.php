<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    /**
     * Upload a file and return its path.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $fileInputName  // The name of the file input field in the request
     * @param  string  $folder  // The folder where the file will be stored
     * @return string|null
     */
    protected function uploadFileAndGetPath(Request $request, $folder="uploads")
    {
        $fileExtension = $request->file->extension();
        $fileName = time() . '.' . $fileExtension;
        $request->file->move(public_path($folder), $fileName);
        $filePath = $folder."/". $fileName;
        return $filePath; 
    }
}
