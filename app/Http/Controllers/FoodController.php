<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFoodRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\FoodService;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{
    protected $foodService;
    public function __construct(FoodService $foodService, 
                                CategoryService $categoryService)
    {
        $this->foodService = $foodService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = $this->foodService->getAll();
        return view('admin.food.index', compact('foods'));
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
        Session::flash('success', 'Create food success!');
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
        //
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
        Session::flash('success', 'Update food success!');
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
}
