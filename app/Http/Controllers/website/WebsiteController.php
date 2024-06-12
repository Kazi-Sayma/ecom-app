<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    private $product;
    public function index()
    {
        return view('website.home.index',[
//            'products'=>Product::where('status',1)->orderby('id','desc')->take(3)->get()
            'products'=>Product::where('status',1)->latest()->take(6)->get()
        ]);
    }

    public function product()
    {
        return view('website.product.index',[
            'products'=>Product::where('status',1)->latest()->get()
        ]);
    }


    public function productDetails($id)
    {
        $this->product = Product::find($id);
        return view('website.product.product-details',[
            'product' => $this->product,
            'productColors' => ProductColor::where('product_id',$this->product->id)->get(),
            'productSizes' => ProductSize::where('product_id',$this->product->id)->get(),
            'productImages' => ProductImage::where('product_id',$this->product->id)->get()
        ]);

//        return view('website.product.product-details');
    }

    public function cart()
    {
        return view('website.cart.index');
    }

    public function checkout()
    {
        return view('website.checkout.index');
    }
}
