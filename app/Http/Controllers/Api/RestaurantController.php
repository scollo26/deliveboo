<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use App\Plate;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::paginate(9);

        return response()->json([
            // 'auth_user' => Auth::check(),
            'response' => true,
            'count' => $users->count(),
            'results' =>  [
                'data' => $users,
            ],
        ]);
    }

    public function RandomRestaurant(){
        $users = User::inRandomOrder()->limit(4)->get();
        return response()->json([
            // 'auth_user' => Auth::check(),
            'response' => true,
            'results' => [
               'data'=>$users
            ]
        ]);
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $users = User::where('id', '>', 0);

        if (
            array_key_exists('orderbycolumn', $data) &&
            array_key_exists('orderbysort', $data)
        ) {
            $users->orderBy($data['orderbycolumn'], $data['orderbysort']);
        }

        if (array_key_exists('categories', $data)) {
            foreach ($data['categories'] as $category) {
                $users->whereHas('categories', function (Builder $query) use ($category) {
                    $query->where('id', $category);
                })->get();
            }
        }


        $users = $users->with(['categories']);
        $users = $users->paginate(4);

        return response()->json([
            'response' => true,
            'count' =>  $users->count(),
            'results' => $users
        ]);
    }

    public function show($slug)
    {
        $user = User::where("slug", "=", $slug)->first();
        $plates = $user->plates()->get();
        $plates = $plates->groupBy('tag_id');
        $tags = Tag::all();
        return response()->json([
            'response' => true,
            'count' => $user ? 1 : 0,
            'results' =>  [
                'restaurant' => $user,
                'plates'=> $plates,
                'tags'=> $tags
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
