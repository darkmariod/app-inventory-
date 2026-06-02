<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoImagenController extends Controller
{
    /**
     * Upload an image for a product.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'file' => 'required|image|max:10240', // 10MB max
        ]);

        $path = $request->file('file')->store('productos', 'public');

        $image = Image::create([
            'path'           => $path,
            'size'           => $request->file('file')->getSize(),
            'imageable_id'   => $product->id,
            'imageable_type' => Product::class,
        ]);

        return response()->json([
            'id'  => $image->id,
            'url' => Storage::url($path),
        ]);
    }

    /**
     * Delete a product image.
     */
    public function destroy(Product $product, Image $image)
    {
        // Ensure the image belongs to this product
        if ($image->imageable_id !== $product->id || $image->imageable_type !== Product::class) {
            abort(404);
        }

        Storage::disk('public')->delete($image->path);
        $image->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
