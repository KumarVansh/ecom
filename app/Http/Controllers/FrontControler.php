<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontControler extends Controller
{
    public function homePage(){
        $title = "Home";
        return view("index",compact('title'));
    }

    public function aboutPage(){
        $title = "About Us";
        return view("about-page",compact('title'));
    }

    public function shopPage(){
        $title = "Shop Section";
        return view("shop-page",compact('title'));
    }

    public function featuresPage(){
        $title = "Features Section";
        return view("features-page",compact('title'));
    }

    public function testimonialsPage(){
        $title = "Users Review Section";
        return view("testimonials-page",compact('title'));
    }

    public function contactPage(){
        $title = "Contact Us";
        return view("contact-page",compact('title'));
    }
}
