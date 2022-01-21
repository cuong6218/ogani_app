<?php

namespace App\Http\Controllers;

use App\Http\Services\FlashMessage;
use App\Http\Services\FoodService;
use Illuminate\Http\Request as HttpRequest;

class CartController extends Controller
{
    public function __construct(FoodService $foodService){
        $this->foodService = $foodService;
    }
    public function list(HttpRequest $request) {
        $cart = [];
        if ($request->session()->has('cart.foods')){
            $cart = $request->session()->get('cart.foods');
        }
        return view('ogani.home.checkout', compact('cart'));
    }
    public function addToCart(HttpRequest $request, $id, $quanty = 1) {
        $food = $this->foodService->getFood($id);
        $request->session()->push('cart.foods', $food);
        $total_price = $food->price*$quanty;
        $request->session()->increment('cart.total_price', $total_price);
        (new FlashMessage)->notifyMsg($request, "Add to cart success!");
        return back();
    }
    public function clear(HttpRequest $request) {
        $request->session()->forget('cart.foods');
        $request->session()->forget('cart.total_price');
        return back();
    }
}
