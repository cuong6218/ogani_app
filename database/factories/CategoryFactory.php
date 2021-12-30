<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = ['Vegestable', 'Seafood', 'Seeds', 'Meat', 'FastFood'];
        return [
            'name' => $name[rand(0, count($name)-1)],
        ];
    }
}
