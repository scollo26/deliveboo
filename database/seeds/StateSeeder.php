<?php

use Illuminate\Database\Seeder;

use App\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array = ['pending'];
        foreach ($array as $key => $value) {

            $newstate = new State();
            $newstate->name = $value;
            $newstate->save();
        }
    }
}
