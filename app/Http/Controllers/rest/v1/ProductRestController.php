<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\rest\v1\ProductRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ProductRestController extends Controller
{
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->has_whatsapp = $request->has_whatsapp;
        $product->recycled = false;
        $product->cell_phone_num = $request->cell_phone_num;
        $product->save();

        foreach ($request->images as $img) {
            $uploadedImg = Cloudinary::upload($img->getRealPath(), ['folder' => 'products']);
            $public_id = $uploadedImg->getPublicId();
            $url = $uploadedImg->getSecurePath();

            $image = new Image();
            $image->public_id = $public_id;
            $image->url = $url;
            $image->product_id = $product->id;
            $image->save();
        }
        return $product;
    }

    public function update($id, ProductRequest $request)
    {
        $user_id = Auth::user()->id;
        $product = Product::findOrFail($id);

        if ($product->user_id != $user_id) {
            throw new HttpResponseException(
                response()->json(['error' => 'Forbidden.'], JsonResponse::HTTP_FORBIDDEN)  //http 403
            );
        }
        if ($product->recycled) {
            throw new HttpResponseException(
                response()->json(['error' => 'Locked.'], JsonResponse::HTTP_LOCKED)  //http 423
            );
        }

        foreach ($product->images as $image) {
            Cloudinary::destroy($image->public_id);
        }
        $product->images()->delete();
        foreach ($request->images as $img) {
            $uploadedImg = Cloudinary::upload($img->getRealPath(), ['folder' => 'products']);
            $public_id = $uploadedImg->getPublicId();
            $url = $uploadedImg->getSecurePath();

            $image = new Image();
            $image->public_id = $public_id;
            $image->url = $url;
            $image->product_id = $product->id;
            $image->save();
        }

        // Update
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->has_whatsapp = $request->has_whatsapp;
        $product->cell_phone_num = $request->cell_phone_num;
        return $product->save();
    }

    public function recycle($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::findOrFail($id);

        if ($product->user_id != $user_id) {
            throw new HttpResponseException(
                response()->json(['error' => 'Forbidden.'], JsonResponse::HTTP_FORBIDDEN)  //http 403
            );
        }
        if ($product->recycled) {
            throw new HttpResponseException(
                response()->json(['error' => 'Locked.'], JsonResponse::HTTP_LOCKED)  //http 423
            );
        }



        $product->recycled = true;
        return $product->save();
    }
    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::findOrFail($id);

        if ($product->user_id != $user_id) {
            throw new HttpResponseException(
                response()->json(['error' => 'Forbidden.'], JsonResponse::HTTP_FORBIDDEN)  //http 403
            );
        }
        if ($product->recycled) {
            throw new HttpResponseException(
                response()->json(['error' => 'Locked.'], JsonResponse::HTTP_LOCKED)  //http 423
            );
        }

        foreach ($product->images as $image) {
            Cloudinary::destroy($image->public_id);
        }

        return $product->delete();
    }
}
