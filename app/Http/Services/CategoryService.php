<?php


namespace App\Http\Services;

use App\Http\Repositories\CategoryRepo;
use App\Models\Category;
use Illuminate\Http\Request;

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
    public function all()
    {
        return $this->cateRepo->all();
    }
    public function store(Request $request)
    {
        $category = new Category();
        $data = $request->all();
        $category->fill($data);
        $this->cateRepo->save($category);
    }
    public function getCategory($id)
    {
        return $this->cateRepo->getCategory($id);
    }
    public function update(Request $request, $id)
    {
        $category = $this->cateRepo->getCategory($id);
        $category->name = $request->name;
        $this->cateRepo->save($category);
    }
    public function destroy($id)
    {
        $this->cateRepo->destroy($id);
    }
}
