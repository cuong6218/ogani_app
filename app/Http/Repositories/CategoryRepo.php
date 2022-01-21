<?php
namespace App\Http\Repositories;

use App\Http\Repositories\BaseRepo;
use App\Models\Category;

class CategoryRepo extends BaseRepo{
    protected $category;
    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->category = $category;
    }
    public function getByName($name) {
        return $this->category->where("name", $name)->get();
    }
}
