<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        // $users = User::all();
        // foreach($users as $key => $value) {
        //     $code1 = $value->id.rand(1000000,9999999);
        //     $code2 = base64_encode($value->id.rand(1000000,9999999));
        //     $value->update([
        //         'referral_one' => $code1,
        //         'referral_two' => $code2,
        //     ]);
        // }
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
    public function productDetails($id, $slug) {
        $product = Product::with('category')->findOrFail($id);
        return view('frontend.pages.productDetails', compact('product'));
    }
}
