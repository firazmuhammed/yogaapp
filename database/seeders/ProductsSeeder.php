<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\ProductCategories;
use App\Models\DiamondDetails;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1000; $i++) {
        $faker = \Faker\Factory::create();
       $product=new Products();//::insert([
         $product->product_name = $faker->word();
           $product->product_type= 0;
           $product->sku= $faker->numberBetween(1111111111, 9999999999);
           $product->slug = Str::random(40);
            $product->metal_type= "gold";//$faker->randomElement(["gold", "diamond"]);
           $product->metal_color= $faker->randomElement(["white", "rose", "yellow"]);
         $product->metal_gross_weight= $faker->randomFloat(2,1, 25);
           $product->metal_net_weight= $faker->randomFloat(2,1, 25);
         $product->metal_price= $faker->numberBetween(1, 100000);
          $product->metal_id= $faker->randomElement(["1", "2", "3"]);
           $product->image= "15_discover1.png";
           $product->quantity= $faker->randomElement(["1", "2", "3"]);
         $product->making_charge= $faker->randomElement(["4", "5", "10"]);
          $product->gst= 5;
           $product->description= $faker->text;
           $product->product_status= 1;
           $product->gender= $faker->randomElement(["male", "female","kids", "others"]);
         $product->occasion= $faker->randomElement(["Work Wear", "Party Wear","Daily Wear", "Traditional Wear","Engagement","Bridal Wear","Casual","Other"]);
          $product->isEssential = 0;
          $product->collection= $faker->randomElement(["1", "2", "3","4"]);
          $product->save();

        $category =new ProductCategories();//::insert( [
          $category->product_id= $product->id;
           $category->category_id= $faker->randomElement(["1", "3","4","5","6","7","8","9"]);
           $category->save();
//        ]);
        if($category->category_id == 4|| $category->category_id == 5){
            $diamond = DiamondDetails::insert( [
             "product_id" => $product->id,
             "weight_in_ct" => $faker->randomFloat(2,1, 25),
             "weight_in_gram" => $faker->randomFloat(2,1, 25),
             "stone_price" => $faker->numberBetween(1, 100000),
             "properties" => $faker->randomElement(['[{"key":"diamond_shape","value":"Round"},{"key":"diamond_quality","value":"VVS-EF"},{"key":"diamond_color","value":"Green"}]',
                                                    '[{"key":"diamond_shape","value":"Oval"},{"key":"diamond_quality","value":"VVSVS-GH"},{"key":"diamond_color","value":"Red"}]',
                                                    '[{"key":"diamond_shape","value":"Classic"},{"key":"diamond_quality","value":"SI-GH"},{"key":"diamond_color","value":"White"}]']),
        ]);
        }
        }  
    }
}
