<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{

    protected $model = SubCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->randomElements([
            'NEW MOVIES',
            'TOP BONGO MOVIES',
            'HOLLYWOOD DUBBED',
            'MOVIES OF THE WEEK',
            'OPAR BANGLAR GOLPO',
            'ACTION MOVIES',
            'POPULAR MOVIES',
            'EXTENDED TIME WITH FAMILY',
            'HINDI DUBBED',
            'BANGLA DUBBED CHINESE',
            'SPECIAL SPOTLIGHT',
            'RIAZ-PURNIMA HITS',
            'DIGITAL PREMIER',
            'SHAKIB-APU',
            'BANGLA CLASSIC MOVIES',
            'MAHIYA MAHI HITS',
            'MISHTI PREMER CHOBI',
            'SHERA MANNA',
        ]);

        $category = Category::pluck('id');

        return [
            'name' => $name[0],
            'category_id' => fake()->randomElements($category)[0]
        ];
    }
}
