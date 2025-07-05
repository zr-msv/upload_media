<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Zm\PolymorphicMedia\Services\MediaService;
use Zm\PolymorphicMedia\Models\Media;

class ProductMediaController extends Controller
{
    public function upload(Request $request, $productId)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $product = Product::findOrFail($productId);
        $media   = (new MediaService)->attachImage($product, $request->file('image'));

        return response()->json(['media' => $media]);
    }

    public function list($productId)
    {
        $product   = Product::findOrFail($productId);
        $mediaList = (new MediaService)->getImages($product);

        return response()->json(['media' => $mediaList]);
    }

    public function delete($mediaId)
    {
        $media = Media::findOrFail($mediaId);
        (new MediaService)->deleteImage($media);

        return response()->json(['message' => 'Deleted']);
    }
}
