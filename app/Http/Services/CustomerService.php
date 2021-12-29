<?php


namespace App\Http\Services;

use App\Http\Repositories\CustomerRepo;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    protected $customerRepo;
    public function __construct(CustomerRepo $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }
    public function getAll()
    {
        return $this->customerRepo->getAll();
    }
    public function all()
    {
        return $this->customerRepo->all();
    }
    public function store(Request $request)
    {
        $customer = new Customer();
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $customer->fill($data);
        $this->customerRepo->save($customer);
    }
    public function getCustomer($id)
    {
        return $this->customerRepo->getCustomer($id);
    }
    public function update(Request $request, $id)
    {
        $customer = $this->customerRepo->getCustomer($id);
        $customer->name = $request->name;
        $this->customerRepo->save($customer);
    }
    public function destroy($id)
    {
        $this->customerRepo->destroy($id);
    }
}
