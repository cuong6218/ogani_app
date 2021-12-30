<?php


namespace App\Http\Repositories;

use App\Models\Food;

class FoodRepo
{
    protected $food;
    public function __construct(Food $food)
    {
        $this->food = $food;
    }
    public function getAll()
    {
        return $this->food->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function all()
    {
        return $this->food->all();
    }
    public function save($food)
    {
        $food->save();
    }
    public function getFood($id)
    {
        return $this->food->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->food->destroy($id);
    }
    public function getByCateId($id){
        return $this->food->where("cate_id", "=", $id);
    }
}
