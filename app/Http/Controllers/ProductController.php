<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;
// use App\Models\NewProducts;
use Illuminate\Support\Facades\DB;

// using the session
Session();


class ProductController extends Controller
{

    // this function displays the product on the homepage
    static function ProductDetials() {

        // returns all the products available in the database
        // return Products::all();

        // getting the data from the database
        $productData = Products::where('id', '<=', 7)->get();

        // passing that data as an array and we'll use this array
        // in our view and the products will be added dynamically
        return view('index', ['products' => $productData]);
        
    }

    function ProductsForProductsPage() {
        $productData = Products::where('id', '>=', 1)->get();
        return view('products', ['products' => $productData]);
    }

    // this function adds the items to the cart when the user clicks
    // clicks on the buy now button
    function addToCart(Request $req) {

        // check whether the user is logged in or not
        if($req->session()->has('user')) {

            $cart = new Cart();
            // getting the id of the logged in user and storing it in the DB
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/home');
            //return "DONE";

        } else {
            return redirect('/login');
        }
    }

    function addProductToCart(Request $req) {
        // check whether the user is logged in or not
        if ($req->session()->has('user')) {

            $cart = new Cart();
            // getting the id of the logged in user and storing it in the DB
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/products');
        } else {
            return redirect('/login');
        }
    }

    // this function counts the number of items in the cart
    static function itemsInCart() {
        $userID = Session()->get('user')['id'];
        // returns count of the items present in the cart of the logged-in user
        return Cart::where('user_id', $userID)->count();
    }
    
    // this function displays all the items present in the cart 
    // of the logged-in user
    function displayCart() {

        if(Session()->has('user')) {
            $userID = Session()->get('user')['id'];
            // getting the details of cart using the join
            $cartItems = DB::table('cart')
            ->join('new_products', 'cart.product_id', '=', 'new_products.id')
            ->where('cart.user_id', $userID)
            ->select('new_products.*', 'cart.id as cart_id')
            ->get();

            return view('cart', ['products'=>$cartItems]);
        } else {
            return redirect('/login');
        }
    }

    // this function deletes the item from the cart when the user click on
    // delete button
    function removeItem($id) {
        // deletes the items from the cart using its id
        Cart::destroy($id);
        return redirect('/cart');
    }

    // this function stores the billing details of the user in orders tabe and 
    // removes the items from the cart table
    function checkOut(Request $req) {

        $userID = Session()->get('user')['id'];
        $cartDetails = Cart::where('user_id', $userID)->get();
        
        foreach($cartDetails as $details) {
            $order = new Order();
            $order->product_id = $details['product_id'];
            $order->user_id = $details['user_id'];
            $order->address = $req->address;
            $order->status = "pending";
            $order->payment_method = $req->paymentMethod;
            $order->name_on_cc = $req->nameOnCC;
            $order->cc_number = $req->numberOnCc;
            $order->save();

            // deleting the items from the cart table after check out
            Cart::where('user_id', $userID)->delete();
        }

        return redirect('/success');
    }

    function searchProduct(Request $req) {
        // get the query entered by the user in the search bar
        // and on the basis of that, we search the data in the database
        // $productName = $req->input('query');
        $productData = Products::where('name', $req->input('query'))->get();
        return view('search', ['products' => $productData, 'query'=>$req->input('query')]);
        // return $productData;

    }

    function productSuggestions() {
        $searchTerm = request('product');
        if(strlen($searchTerm) > 0) {
            $results = DB::select(DB::raw("SELECT * FROM new_products WHERE name LIKE '$searchTerm%'"));
            return response($results);
        } 
        // return response($searchTerm);
    }
}

