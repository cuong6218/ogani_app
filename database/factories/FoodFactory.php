<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    protected $model = Food::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = ['Pig', 'Tomato', 'Pork', 'Apple', 'Orange'];
        $image_url = [
            "file-dump/pd-".rand(1,6).".jpg",
            "file-dump/product-".rand(1,12).".jpg",
            "file-dump/product-details-".rand(1,5).".jpg",
            "file-dump/thumb-".rand(1,4).".jpg",
        ];
        return [
            'name' => $name[rand(0, count($name) -1)],
            'price' => round(rand(1,20)/rand(1,20), 2),
            'image_url' => $image_url[rand(0, count($image_url) -1)],
            'cate_id' => rand(1,10),
        ];
    }
}
