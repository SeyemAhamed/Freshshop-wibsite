<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $hotProducts = Product::where('product_type', 'hot')->orderBy('id', 'desc')->get();
        $newProducts = Product::where('product_type', 'new')->orderBy('id', 'desc')->get();
        $regularProducts = Product::where('product_type', 'regular')->orderBy('id', 'desc')->get();
        $discountProducts = Product::where('product_type', 'discount')->orderBy('id', 'desc')->get();
        return view ('home.index', compact('hotProducts','newProducts','regularProducts', 'discountProducts'));
    }
    
    public function productDetalis ($id)
    {
        $product = Product::where('id', $id)->with('color', 'size', 'galleryImage')->first();
        return view('home.product-detalis', compact('product'));
    }

    public function viewCart ()
    {
        return view('home.view-cart');
    }

    public function productCheckout ()
    {
        return view('home.checkout');
    }

    public function shopProduct ()
    {
        return view('home.shop-product');
    }

    public function returnProduct ()
    {
        return view('home.return-product');
    }

    public function privacyPolicy ()
    {
        return view('home.privacy-policy');
    }

    public function termsConditions ()
    {
        return view('home.terms-conditions');
    }

    public function refundPolicy ()
    {
        return view('home.refund-policy');
    }

    public function aboutUs ()
    {
        return view('home.about-us');
    }

    public function contactUs ()
    {
        return view('home.contact-us');
    }

    public function blogPage ()
    {
        return view('home.blog-page');
    }

    public function careersPage ()
    {
        return view('home.careers-page');
    }

    //Add to Cart...
    public function addtoCartDetalis (Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::where('id', $id)->first();
        $action = $request->action;


        if($cartProduct == null){
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = $request->qty;
            if($product->discount_price !=null){
                $cart->price = $product->discount_price;
            }
            elseif($product->discount_price ==null){
                $cart->price = $product->regular_price;
            }

            $cart->size = $request->size;
            $cart->color = $request->color;

            $cart->save();
            if($action == 'addtoCart'){
                toastr()->success('Added to Cart!');
                return redirect()->back();
            }
            else{
                toastr()->success('Added to Cart!');
                return redirect('/product/Checkout');
            }
        }

        elseif($cartProduct !=null){
            $cartProduct->qty = $cartProduct->qty + $request->qty;
            $cartProduct->save();
            if($action == 'addtoCart'){
                toastr()->success('Added to Cart!');
                return redirect()->back();
            }
            else{
                toastr()->success('Added to Cart!');
                return redirect('/product/Checkout');
            }
        }
    }

    public function addtoCartHome(Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::where('id', $id)->first();

        if ($cartProduct == null) {
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = 1;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } elseif ($product->discount_price == null) {
                $cart->price = $product->regular_price;
            }

            $cart->save();
            toastr()->success('Added to Cart!');
            return redirect()->back();
        } elseif ($cartProduct != null) {
            $cartProduct->qty = $cartProduct->qty + 1;
            $cartProduct->save();
            toastr()->success('Added to Cart!');
            return redirect()->back();
        }
    }
}


