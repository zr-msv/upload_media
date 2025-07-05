<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Zm\PolymorphicMedia\Traits\HasMedia;

class Product extends Model
{
    use HasMedia;

    protected $fillable = ['name'];
}
