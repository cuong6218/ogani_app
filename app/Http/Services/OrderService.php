<?php


namespace App\Http\Services;

use App\Models\Order;
use Illuminate\Http\Request;;

use App\Http\Repositories\OrderRepo;

class OrderService
{
    protected $orderRepo;
    public function __construct(OrderRepo $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }
    public function getAll()
    {
        return $this->orderRepo->getAll();
    }
    public function store(Request $request)
    {
        $order = new Order();
        $data['user_id'] = $request->user_id;
        $data['total_price'] = $request->total_price;
        $data['order_id'] = rand(100000, 999999);
        $data['notes'] = $request->notes;
        $data['status'] = 'NEW';
        $order->fill($data);
        $this->orderRepo->save($order);
    }
    public function getOrder($id)
    {
        return $this->orderRepo->getOrder($id);
    }
    public function updatePending($id)
    {
        $order = $this->orderRepo->getOrder($id);
        if ($order->status != 'NEW'){
            return false;
        }
        $order->status = 'PENDING';
        $this->orderRepo->save($order);
    }
    public function updateSuccess($id)
    {
        $order = $this->orderRepo->getOrder($id);
        if ($order->status != 'PENDING'){
            return false;
        }
        $order->status = 'SUCCESS';
        $this->orderRepo->save($order);
    }
    public function updateFail($id)
    {
        $order = $this->orderRepo->getOrder($id);
        if ($order->status != 'PENDING'){
            return false;
        }
        $order->status = 'FAIL';
        $this->orderRepo->save($order);
    }
    public function getTotalPrice() {
        return $this->orderRepo->getTotalPrice();
    }
}
