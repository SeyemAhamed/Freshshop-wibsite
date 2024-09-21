<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        return view ('home.index');
    }
    
    public function productDetalis ()
    {
        return view('home.product-detalis');
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
}

