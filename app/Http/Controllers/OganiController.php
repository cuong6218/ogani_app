<?php
namespace App\Http\Controllers;

use App\Http\Services\FoodService;
use App\Http\Services\CategoryService;
use App\Http\Services\FlashMessage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

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
        $categories_header = $this->categoryService->getAll(10);
        return view('ogani.home.index', compact('foods', 'categories', 'categories_header'));
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
    public function search(Request $request){
        if ($request->name){
            $foods = $this->foodService->searchCategoryOrFood($request);
            $foods->appends(['name' => $request->name]);
            return view('ogani.home.shop_grid', compact('foods'));
        }
        (new FlashMessage)->notifyMsg($request, "Type your keyword!", "error");
        return redirect()->route('ogani.index');
    }
}