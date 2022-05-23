<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $Product_name = $this->faker->unique()->words(3, true);
        $Product_slug = Str::slug($Product_name);
        return [
            'name' => $Product_name,
            'slug' => $Product_slug,
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->paragraphs(3, true),
            'regular_price' => $this->faker->randomFloat(2, 1, 100),
            'sale_price' => $this->faker->randomFloat(2, 1, 100),
            'sku' => $this->faker->unique()->numberBetween(1, 10000),
            'stock_status' => $this->faker->randomElement(['in_stock', 'out_of_stock']),
            'featured' => $this->faker->boolean,
            'quantity' => $this->faker->randomDigit,
            'image' => 'digital_'.$this->faker->numberBetween(1, 22).'.jpg',
            'images' => $this->faker->imageUrl(400, 400, 'technics'),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
        return [
            //
        ];
    }
}
