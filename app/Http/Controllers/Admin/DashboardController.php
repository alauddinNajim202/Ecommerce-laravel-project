<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        $category = Category::count();
        $sub_category = SubCategory::count();
        $product = Product::count();
        $order = Order::count();
        $order = Product::count();
        $user = User::count();
        $cart = Cart::sum('price');
        return view('admin.dashboard', compact('category', 'sub_category', 'product', 'order', 'user', 'cart'));
    }
}
