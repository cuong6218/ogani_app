<?php


namespace App\Http\Services;

use App\Http\Repositories\FoodRepo;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodService
{
    protected $foodRepo;
    public function __construct(FoodRepo $foodRepo)
    {
        $this->foodRepo = $foodRepo;
    }
    public function getAll()
    {
        return $this->foodRepo->getAll();
    }
    public function all()
    {
        return $this->foodRepo->all();
    }
    public function store(Request $request)
    {
        $food = new Food();
        $data = $request->all();
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $path = $image->store('file-upload', 'public');
            $data['image_url'] = $path;
        }
        $food->fill($data);
        $this->foodRepo->save($food);
    }
    public function getFood($id)
    {
        return $this->foodRepo->getFood($id);
    }
    public function update(Request $request, $id)
    {
        $food = $this->foodRepo->getFood($id);
        $data = $request->all();
        if ($request->hasFile('image_url')) {
            $currentImg = $food->image_url;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image_url');
            $path = $image->store('file-upload', 'public');
            $data['image_url'] = $path;
        }
        $food->fill($data);
        $this->foodRepo->save($food);
    }
    public function destroy($id)
    {
        $this->foodRepo->destroy($id);
    }
}
