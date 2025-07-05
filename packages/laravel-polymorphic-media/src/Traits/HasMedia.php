<?php
namespace Zm\PolymorphicMedia\Traits;

use Zm\PolymorphicMedia\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasMedia
{
public function media(): MorphMany
{
return $this->morphMany(Media::class, 'mediable');
}
}
