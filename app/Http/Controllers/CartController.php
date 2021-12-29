<?php

namespace App\Http\Controllers;

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
    public function addToCart(HttpRequest $request) {
        $food = $this->foodService->getFood($request->id);
        $request->session()->push('cart.foods', $food);
        $request->session()->increment('cart.total_price', $food->price);
        return back();
    }
    public function clear(HttpRequest $request) {
        $request->session()->forget('cart.foods');
        $request->session()->forget('cart.total_price');
        return back();
    }
}
