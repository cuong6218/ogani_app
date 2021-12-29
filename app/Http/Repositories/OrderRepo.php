<?php


namespace App\Http\Repositories;

use App\Models\Order;

class OrderRepo
{
    protected $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function getAll()
    {
        return $this->order->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function save($order)
    {
        $order->save();
    }
    public function getOrder($id)
    {
        return $this->order->findOrFail($id);
    }

}
