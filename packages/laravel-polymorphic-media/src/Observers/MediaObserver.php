<?php

namespace Zm\PolymorphicMedia\Observers;

use Zm\PolymorphicMedia\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaObserver
{
    public function deleting(Media $media): void
    {
        if ($media->path && Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }
    }
}