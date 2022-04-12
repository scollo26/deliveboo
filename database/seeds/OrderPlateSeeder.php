<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Plate;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderPlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $randInt = random_int(1, count(User::all()));
            $random = random_int(1, 7);
            $randomPlates = Plate::inRandomOrder()->where('user_id', $randInt)->limit($random)->get();
            foreach ($randomPlates as $plate) {
                $randomQuantity = $faker->numberBetween(1,10);
                $order->plates()->attach($plate, ['quantity'=> $randomQuantity]);
            }
        }
    }
}
