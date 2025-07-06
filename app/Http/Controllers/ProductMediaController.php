<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

        return response()->json([
            'status'  => Response::HTTP_CREATED,
            'message' => 'Image uploaded successfully.',
            'data'    => $media,
        ], 201);
    }

    public function list($productId)
    {
        $product   = Product::findOrFail($productId);
        $mediaList = (new MediaService)->getImages($product);

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => 'Media list retrieved.',
            'data'    => $mediaList,
        ], 200);
    }

    public function delete($mediaId)
    {
        $media = Media::findOrFail($mediaId);
        (new MediaService)->deleteImage($media);

        return response()->json([
            'status'  => Response::HTTP_NO_CONTENT,
            'message' => 'Image deleted successfully.',
            'data'    => null,
        ], );
    }
}
