<?php

namespace Zm\PolymorphicMedia\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = [
        'file_path',
        'mediable_id',
        'mediable_type',
    ];

    protected $appends = ['url', 'extension'];

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => asset(Storage::url($attributes['path']))
        );
    }

    protected function extension(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => pathinfo($attributes['path'], PATHINFO_EXTENSION)
        );
    }
}

