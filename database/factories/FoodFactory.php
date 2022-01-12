<?php

namespace Database\Factories;

use App\Models\Category;
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
        $cate_ids = Category::all(['id']);
        $name = $this->faker->randomElement(['Pig', 'Tomato', 'Pork', 'Apple', 'Orange']);
        $price = $this->faker->randomFloat(1, 1, 10);
        $image_list = [
            "file-dump/pd-" . rand(1, 6) . ".jpg",
            "file-dump/product-" . rand(1, 12) . ".jpg",
            "file-dump/product-details-" . rand(1, 5) . ".jpg",
            "file-dump/thumb-" . rand(1, 4) . ".jpg",
        ];
        $image_url = $this->faker->randomElement($image_list);
        $cate_id = $this->faker->randomElement($cate_ids);
        return [
            'name' => $name,
            'price' => $price,
            'image_url' => $image_url,
            'cate_id' => $cate_id,
        ];
    }
}
