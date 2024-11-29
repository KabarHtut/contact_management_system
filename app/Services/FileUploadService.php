<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function upload($directory, $file, $disk = 'public')
    {
        $path = Storage::disk($disk)->put($directory, $file);

        $full_path = "/storage/$path";

        return [
            'originalName' => $file->getClientOriginalName(),
            'path' => $full_path,
            'realName' => explode($directory . '/', $path)[1],
            'type' => $file->getMimeType()
        ];
    }
}