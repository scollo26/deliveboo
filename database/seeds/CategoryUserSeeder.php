<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;


class CategoryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
     
    public function run()
        {
            $users = User::all();
            foreach ($users as $user) 
            {
                $index = $user->id;
                switch (true) {
                    case $index == 1 || $index == 3 || $index == 4:
                        $categoriesID = [1,4,5];
                        break;
                    case $index == 2 || $index == 8:
                        $categoriesID = 4;
                        break;
                    case $index == 6 || $index == 7:
                        $categoriesID = [6,5];
                        break;
                    case $index == 9:
                        $categoriesID = [3,5];
                        break;
                    case $index == 5 || $index == 10:
                        $categoriesID = [2,5];
                        break;
                }
                if(gettype($categoriesID) == 'array')
                {
                    $string = '';
                    foreach($categoriesID as $id)
                    {
                        $string = $string.'id = '.$id.' OR ';
                    }
                    $categories = Category::whereRaw($string.' id = 0')->get();
                }
                else
                {
                    $categories = Category::where('id', $categoriesID)->get();
                }
                $user->categories()->attach($categories);
            }
        }
}
