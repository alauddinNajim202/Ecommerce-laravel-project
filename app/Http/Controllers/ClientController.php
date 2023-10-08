<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInformation;
use Illuminate\Http\Request;
use App\Models\Category;


class ClientController extends Controller

{
    public function CategoryPage($id){

        $categories = Category::findOrfail($id);
        $products = Product::where('product_category_id',$id)->get();
        return view('frontend.category', compact('categories','products'));
    }


    public function SingleProduct($id){
        $products = Product::findOrfail($id);
        $sub_category = Product::where('id', $id)->value('product_category_id');
        $related_product = Product::where('product_category_id',$sub_category)->get();
        return view('frontend.singleproduct', compact('products', 'related_product'));
    }

    public function AddToCart(){
        $Items = Cart::orderBy('id', 'DESC')->get();
        return view('frontend.addtocart', compact('Items'));
    }

    public function AddProductToCart(Request $request){
        $product_price  = $request->price;
        $product_quantity  = $request->quantity;

        $price = $product_price * $product_quantity;

        Cart::insert(
            [
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $price,
            ]
        );

        return redirect()->route('addtocart')->with('message', 'Item add to cart successfully');
    }

    public function removeCartItem($id){

        Cart::findOrfail($id)->delete();

        return redirect()->route('addtocart')->with('message', 'Item remove to cart successfully');

    }

    public function ShippingAdress(){
        return view('frontend.shippingaddress');
    }

    public function AddShippingAdress(Request $request){

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|unique:shipping_information',
            'city_name' => 'required',
            'postal_code' => 'required',
        ]);

        ShippingInformation::insert([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'city_name' => $request->city_name,
                'postal_code' => $request->postal_code,

        ]);

        return redirect()->route('checkout')->with('message', 'Information send successfully');


    }
    public function Checkout(){
        $shipping_address = ShippingInformation::orderBy('id', 'DESC')->first();
        //dd($shipping_address);
        $items = Cart::orderBy('id', 'DESC')->get();
        return view('frontend.checkout', compact('items', 'shipping_address'));
    }

    public function PlaceOrder(){

        $shipping_address = ShippingInformation::orderBy('id', 'DESC')->first();
        //dd($shipping_address);
        $items = Cart::orderBy('id', 'DESC')->get();


        foreach($items as $item){
            Order::insert([
                'Shipping_phoneNumber' => $shipping_address->phone_number,
                'Shipping_cityName' => $shipping_address->city_name,
                'Shipping_postalcode' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        $shipping_address = ShippingInformation::orderBy('id', 'DESC')->delete();


        return redirect()->route('pendingorder')->with('message', 'Order Placed successfully');
    }

    public function UserProfile(){
        return view('frontend.userprofile');
    }

    public function pendingOrder(){

        $pending_order = Order::where('status','pending')->latest()->get();
        return view('frontend.pendigorder', compact('pending_order'));
    }

    public function history(){
        return view('frontend.history');
    }

    public function NewRelease(){
        return view('frontend.newrelease');
    }

    public function TodaysDeal(){
        return view('frontend.todaysdeal');
    }

    public function CustomerService(){
        return view('frontend.customerservice');
    }
}
