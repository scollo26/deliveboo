<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 8; $i++) {
            $newOrder = new Order();
            $newOrder->totalPrice = $faker->randomFloat(null, 0, 1000);
            $newOrder->state_id = 1;
            $newOrder->save();
        }
    }
}
