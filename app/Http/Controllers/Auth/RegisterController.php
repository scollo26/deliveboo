<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Category;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showRegistrationForm()
    {
        $categories = Category::all();
        return view('auth.register', ['categories' => $categories]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)

    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'iva' => ['required', 'string', 'min:11', 'unique:users'],
            'categories'=> ['required'],
            'categories.*' => ['exists:App\Category,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        //     $user = new User();
        //     $user->fill($data);
        //     $user->save();


        //     if (!empty($data['categories'])) {
        //         $categories = explode(", ", $data['categories']);
        //         $category_id = [];
        //         foreach ($categories as $element) {
        //             $category = rtrim($element, ".");
        //             $checkCategory = Category::where('name', $category)->first();
        //             if (empty($checkCategory)) {
        //                 $newCategory = new Category();
        //                 $newCategory->name = $category;
        //                 $newCategory->save();
        //             }
        //             $item_id = Category::where('name', $category)->first();
        //             array_push($category_id, $item_id->id);
        //         }



        //         $user->categories()->associate($category_id);
        //     } else {
        //         //if we don't have tags we detach all
        //         $user->categories()->detach();
        //     }





        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'iva' => $data['iva'],
            'password' => Hash::make($data['password']),
        ]);

        $user->categories()->sync($data['categories']);

        return $user;
    }
}
