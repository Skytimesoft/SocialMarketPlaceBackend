<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $category_with_product = Category::with(['childs', 'products'])->get();
        return view('home', compact('category_with_product'));
    }

    public function faq() {
        return view('frontend.pages.faq');
    }
    public function recommendations() {
        return view('frontend.pages.recommendations');
    }
    public function selection() {
        return view('frontend.pages.selection');
    }
    public function rules() {
        return view('frontend.pages.rules');
    }
}
