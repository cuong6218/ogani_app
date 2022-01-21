<?php


namespace App\Http\Services;

use App\Http\Repositories\CategoryRepo;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;

class CategoryService
{
    protected $cateRepo;
    public function __construct(CategoryRepo $cateRepo)
    {
        $this->cateRepo = $cateRepo;
    }
    public function getAll()
    {
        return $this->cateRepo->getAll();
    }
    public function getAllWithPaginate($item_number = 5)
    {
        return $this->cateRepo->getAllWithPaginate($item_number);
    }
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        $data = $request->all();
        $category->fill($data);
        $this->cateRepo->save($category);
    }
    public function getDetail($id)
    {
        return $this->cateRepo->getDetail($id);
    }
    public function update(CreateCategoryRequest $request, $id)
    {
        $category = $this->cateRepo->getDetail($id);
        $category->name = $request->name;
        $this->cateRepo->save($category);
    }
    public function destroy($id)
    {
        $this->cateRepo->delete($id);
    }
    public function getByName($name)
    {
        return $this->cateRepo->getByName($name);
    }
}
