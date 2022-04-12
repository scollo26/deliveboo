<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurantCategory = [

            [
                'id' => 1,
                'name' => 'Italiano',
                'img_category'=> '/images/category/italian.png',
            ],
            [
                'id' => 2,
                'name' => 'Giapponese',
                'img_category'=> '/images/category/japanese.png'
            ],
            [
                'id' => 3,
                'name' => 'Vegetariano',
                'img_category'=> '/images/category/healthy.png',
            ], 
            [
                'id' => 4,
                'name' => 'Pizzeria',
                'img_category'=> '/images/category/pizza.png',
                
            ],
            [
                'id' => 5,
                'name' => 'Dolci',
                'img_category'=> '/images/category/dessert.png',  
            ],
            [
                'id' => 6,
                'name' => 'Burger',
                'img_category'=> '/images/category/burger.png',
            ],

        ];
     
     foreach($restaurantCategory as $key=>$category)  {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->img_category = $category['img_category'];
            $newCategory->save();
        }
    }
}
