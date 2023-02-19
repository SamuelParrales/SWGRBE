<?php

namespace App\Http\Controllers\mvc;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $order_by = $request->input('order_by','desc');
        $name = $request->input('name',null);
        $category_id = $request->input('category_id',null);
        $searchParams = compact('order_by','name','category_id');

        $products = Product::query();
        if(Auth::guest())
        {
            $products = Product::where('recycled',false);
        }
        else
        {
            $profile_type = substr(Auth::user()->profile_type, 11);

            if($profile_type=='Offeror')
            {
                $products = Product::where('recycled',false);
            }
        }

        //Filters
        if($name) $products = $products->where('name','like','%'.$name.'%');

        if($category_id) $products = $products->where('category_id',$category_id);

        if($order_by == 'desc' || $order_by == 'asc')
        {
            $products = $products->orderBy('updated_at',$order_by);
        }

        $products = $products->paginate(8);
        $products->appends($searchParams);
        return view("product.index",compact('products','searchParams'));

    }

    public function show($id)
    {
        $product = Product::findorFail($id);
        return view('product.show',compact('product'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $product = Product::findorFail($id);
        if($product->recycled)
            abort(404);

        if($user_id != $product->user_id)
            abort(403);

        return view('product.edit',compact('product'));
    }
}
