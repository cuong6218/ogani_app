<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Services\FlashMessage;
use App\Http\Services\OrderService;
class OrderController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        $orders = $this->orderService->getAll();
        return view('admin.order.index', compact('orders'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        if($request->session()->get('cart.foods') != null){
            $this->orderService->store($request);
            $request->session()->remove('cart.foods');
            $request->session()->remove('cart.total_price');
            (new FlashMessage)->_notifyMsg($request, "You place order success!", "success" );
        } else {
            (new FlashMessage)->_notifyMsg($request, "Please choose your foods!", "error" );
        }
        return redirect()->route('ogani.index');
    }
    public function updatePending($id){
        $result = $this->orderService->updatePending($id);
        if ($result == false){
            return back();
        }
        return redirect()->route('order.index');
    }
    public function updateSuccess($id){
        $result = $this->orderService->updateSuccess($id);
        if ($result == false){
            return back();
        }
        return redirect()->route('order.index');
    }
    public function updateFail($id){
        $result = $this->orderService->updateFail($id);
        if ($result == false){
            return back();
        }
        return redirect()->route('order.index');
    }
}
