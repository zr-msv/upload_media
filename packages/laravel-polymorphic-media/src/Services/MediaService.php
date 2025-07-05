<?php

namespace Zm\PolymorphicMedia\Services;

use Illuminate\Http\UploadedFile;
use Zm\PolymorphicMedia\Models\Media;

class MediaService
{
    public function attachImage($model, UploadedFile $file): Media
    {
        $path = $file->store('media', 'public');

        return $model->media()->create([
            'file_path' => $path,
        ]);
    }

    public function deleteImage(Media $media): bool
    {
        \Storage::disk('public')->delete($media->file_path);

        return $media->delete();
    }

    public function getImages($model)
    {
        return $model->media;
    }
}
