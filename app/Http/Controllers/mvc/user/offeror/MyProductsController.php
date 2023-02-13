<?php

namespace App\Http\Controllers\mvc\user\offeror;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProductsController extends Controller
{
    public function index(Request $request)
    {
        $order_by = $request->input('order_by','desc');
        $searchParams = compact('order_by');
        $products = Product::where('user_id',Auth::user()->id);

        if($order_by == 'desc' || $order_by == 'asc')
        {
            $products = $products->orderBy('updated_at',$order_by);
        }

        $products=  $products->paginate(5);

        $products->appends($searchParams);

        return view('user.offeror.myProducts',compact('products','searchParams'));
    }
}
