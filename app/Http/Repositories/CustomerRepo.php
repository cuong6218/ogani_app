<?php


namespace App\Http\Repositories;

use App\Models\Customer;

class CustomerRepo
{
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function getAll()
    {
        return $this->customer->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function all()
    {
        return $this->customer->all();
    }
    public function save($customer)
    {
        $customer->save();
    }
    public function getCustomer($id)
    {
        return $this->customer->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->customer->destroy($id);
    }
}
