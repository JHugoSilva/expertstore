<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPhotosController extends Controller
{
    public function store(Product $product, Request $request) {

        $files = $request->photos;

        $photos = [];
        foreach ($files as $file) {
            $photos[] = ['photos' => $file->store('products', 'public')];
        }

        $product->photos()->createMany($photos);
    }
}
