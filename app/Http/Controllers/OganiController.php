<?php
namespace App\Http\Controllers;

use App\Http\Services\FoodService;
use App\Http\Services\CategoryService;
use App\Http\Services\FlashMessage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
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
    public function search(Request $request){
        if ($request->name){
            $foods = DB::table('foods')->select('foods.name as food_name', 'foods.id', 'foods.price', 'categories.name as cate_name')->join('categories', function ($join){
                $join->on('foods.cate_id', '=', 'categories.id');
            })->where('categories.name', 'like', '%'.$request->name.'%')
            ->orWhere('foods.name', 'like', '%'.$request->name.'%')->get();
            
            return view('ogani.home.shop_grid', compact('foods'));
        }
        (new FlashMessage)->_notifyMsg($request, "Type your keyword!", "error");
        return redirect()->route('ogani.index');
    }
}