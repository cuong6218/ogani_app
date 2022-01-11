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
        return $this->food->select('*')->orderBy('id', 'desc')->paginate(6);
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
    public function searchCategoryOrFood($name) {
        return $this->food->select('foods.id', 'foods.name as food_name', 'foods.image_url', 'foods.price', 'categories.name as cate_name')->join('categories', function ($join){
            $join->on('foods.cate_id', '=', 'categories.id');
        })->where('categories.name', 'like', '%'.$name.'%')
        ->orWhere('foods.name', 'like', '%'.$name.'%')->paginate(6);
    }
    public function getByCateId($id){
        return $this->food->select('foods.id', 'foods.name', 'foods.image_url', 'foods.price')
                            ->where('cate_id', '=', $id)->paginate(6);
    }
}
