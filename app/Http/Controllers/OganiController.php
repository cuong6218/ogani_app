<?php
namespace App\Http\Controllers;

use App\Http\Services\FoodService;
use App\Http\Services\CategoryService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class OganiController extends BaseController
{
    public function __construct(FoodService $foodService, 
                                CategoryService $categoryService)
    {
        $this->foodService = $foodService;
        $this->categoryService = $categoryService;
    }
    public function index() {
        $foods = $this->foodService->getAll();
        $categories = $this->categoryService->getAll();
        return view('ogani.home.index', compact('foods', 'categories'));
    }
    
    public function shopGrid() {
        return view('ogani.home.shop_grid');
    }
    public function blog() {
        return view('ogani.home.blog');
    }
    public function contact() {
        return view('ogani.home.contact');
    }
}