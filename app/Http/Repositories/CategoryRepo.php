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
    public function getAll()
    {
        return $this->category->select('*')->orderBy('id', 'desc')->paginate(5);
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
}
