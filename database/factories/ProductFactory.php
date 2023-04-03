<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "product_name" => $this->faker->name(),
            
            "sku" => $this->faker->sku(),
            "slug" => Str::slug($this->faker->name),
            "metal_type" => $this->faker->randomElement(["gold", "diamond"]),
            "metal_color" => $this->faker->randomElement(["white", "rose", "yellow"]),
            "metal_gross_weight" => $this->faker->randomFloat(1, 25),
            "metal_net_weight" => $this->faker->randomFloat(1, 25),
            "metal_price" => $this->faker->numberBetween(1, 100000),
            "metal_id" => $this->faker->randomElement(["1", "2", "3"]),
            "image" => $this->faker->imageUrl,
            "quantity" => $this->faker->randomElement(["1", "2", "3"]),
            "making_charge" => $this->faker->randomElement(["4", "5", "10"]),            
            "description" => $this->faker->text,           
            "gender" => $this->faker->randomElement(["male", "female","kids", "others"]),
            "occasion" => $this->faker->randomElement(["Work Wear", "Party Wear","Daily Wear", "Traditional Wear","Engagement","Bridal Wear","Casual","Other"]),            
            "collection" => $this->faker->randomElement(["1", "2", "3","4"]),
        ];
    }
}
