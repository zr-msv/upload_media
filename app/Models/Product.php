<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Zm\PolymorphicMedia\Traits\HasMedia;

class Product extends Model
{
    use HasMedia,HasFactory;

    protected $fillable = ['name'];
}
