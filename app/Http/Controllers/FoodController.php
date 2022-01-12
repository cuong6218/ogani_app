<?php

namespace App\Http\Controllers;

use App\Exports\FoodExport;
use App\Http\Requests\CreateFoodRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\FlashMessage;
use App\Http\Services\FoodService;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Excel;

class FoodController extends Controller
{
    protected $foodService;
    public function __construct(FoodService $foodService, 
                                CategoryService $categoryService,
                                Excel $excel)
    {
        $this->foodService = $foodService;
        $this->categoryService = $categoryService;
        $this->excel = $excel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        $foods = $this->foodService->getAll();
        if ($foods != NULL) $total = $foods->total();
        return view('admin.food.index', compact('foods', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->all();
        return view('admin.food.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFoodRequest $request)
    {
        $this->foodService->store($request);
        (new FlashMessage)->notifyMsg($request, "Create food infos success!");
        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = $this->foodService->getFood($id);
        // dd($food->id);
        return view('ogani.home.shop_detail', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryService->all();
        $food = $this->foodService->getfood($id);
        return view('admin.food.update', compact('food', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFoodRequest $request, $id)
    {
        $this->foodService->update($request, $id);
        (new FlashMessage)->notifyMsg($request, "Update food infos success!");
        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->foodService->destroy($id);
        Session::flash('error', 'Selected food was deleled!');
        return redirect()->route('food.index');
    }
    public function export() {
        return $this->excel->download(new FoodExport($this->foodService), 
                                    'food.xlsx');
    }
}
