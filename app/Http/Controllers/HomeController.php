<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Order;
use App\Models\OrderDetalis;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $hotProducts = Product::where('product_type', 'hot')->orderBy('id', 'desc')->get();
        $newProducts = Product::where('product_type', 'new')->orderBy('id', 'desc')->get();
        $regularProducts = Product::where('product_type', 'regular')->orderBy('id', 'desc')->get();
        $discountProducts = Product::where('product_type', 'discount')->orderBy('id', 'desc')->get();
        $homeBanner = HomeBanner::first();
        return view ('home.index', compact('hotProducts','newProducts','regularProducts', 'discountProducts','homeBanner'));
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

    public function shopProduct (Request $request)
    {
        if(isset($request->categoryId)){
            $type = 'category';
            $categoryProducts = Category::where('id', $request->categoryId)->with('product')->first();
            return view('home.shop-product', compact('categoryProducts','type'));
        }
        if(isset($request->subCategoryId)){
            $type = 'subCategory';
            $subCategoryProducts = SubCategory::where('id', $request->subCategoryId)->with('product')->first();
            return view('home.shop-product', compact('subCategoryProducts', 'type'));
        }
        $type = 'normal';
        $product = Product::orderBy('id', 'desc')->get();
        return view('home.shop-product', compact('product', 'type'));
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

    public function addtoCartDelete ($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();

        
        return redirect()->back();
    }

    //Confirm Order...
    public function confirmOrder (OrderRequest $request)
    {
        $order = new Order();

        $previousOrder = Order::orderBy('id','desc')->first();
        if ($previousOrder == null){
            $order->invoiceId = 'MOM-1';
        }
        if($previousOrder != null){
            $generateInvoiceId = 'MOM-'.$previousOrder->id+1;
            $order->invoiceId =  $generateInvoiceId;
        }

        $order->c_name = $request->c_name;
        $order->c_phone = $request->c_phone;
        $order->c_email = $request->c_email;
        $order->address = $request->address;
        $order->area = $request->area;
        $order->price = $request->inputgrandTotal;

        //Store Info into OrderDetalis table....
        $cartProduct = Cart::with('product')->where('ip_address', $request->ip())->get();
        if($cartProduct->isNotEmpty()){
            $order->save();
            foreach($cartProduct as $cart){
                $orderDetalis = new OrderDetalis();

                $orderDetalis->order_id = $order->id;
                $orderDetalis->product_id = $cart->product_id;
                $orderDetalis->qty = $cart->qty;
                $orderDetalis->price = $cart->price;
                $orderDetalis->size = $cart->size;
                $orderDetalis->color = $cart->color;

                $orderDetalis->save();
                $cart->delete();
            }
        }

        else{
            toastr()->warning('No Products in your cart');
            return redirect('/');
        }

        toastr()->success('Order is placed successfully!');
        return redirect('/order-confirmed/'.$generateInvoiceId );
    }

    public function thankyouPgae ($invoiceId)
    {
        return view('home.thankyou', compact('invoiceId'));
    }

    //Category Products...
    public function categoryProducts ($id)
    {
        $categoryProducts = Category::where('id', $id)->with('product')->first();
        return view('home.category-product', compact('categoryProducts'));
    }

    public function subCategoryProducts ($id)
    {
        $subCategoryProducts = SubCategory::where('id', $id)->with('product')->first();
        return view('home.sub-category-product', compact('subCategoryProducts'));
    }

    //Search Products...
    public function searchProducts (Request $request)
    {
        if(isset($request->search)){
            $product = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
            return view('home.search-product', compact('product'));
        }
    }
}


