<?php


namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepo
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getAll($item_number)
    {
        return $this->category->select('*')->orderBy('id', 'desc')->paginate($item_number);
    }
    public function all()
    {
        return $this->category->all();
    }
    public function save($category)
    {
        $category->save();
    }
    public function getCategory($id)
    {
        return $this->category->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->category->destroy($id);
    }
    public function getByName($name) {
        return $this->category->where("name", $name)->get();
    }
}
