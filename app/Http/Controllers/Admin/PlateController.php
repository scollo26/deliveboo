<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Plate;
use App\Tag;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->id != $plate->user_id) {
        //     abort('403');
        // }
        $plates = Plate::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.plates.index', ['plates' => $plates]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates = Plate::all();
        $tags = Tag::all();
        return view('admin.plates.create', ['plates' => $plates, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $validateData = $request->validate([
            'tag_id' => 'required|exists:App\Tag,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'ingredients' => 'required',
            'visible' => 'required|boolean',
            'preview' => 'nullable|image',
        ]);
        if (!empty($data['preview'])) {
            $img_path = Storage::put('uploads', $data['preview']);
            $data['preview'] = $img_path;
        }


        $newPlate = new Plate();
        $newPlate->fill($data);
        $newPlate->slug = $newPlate->createSlug($data['name']);
        $newPlate->save();
        if (!empty($data['tag_id'])) {
            // $newPlate->tag()->attach($data['tag_id']);
            $newPlate->tag()->associate($data['tag_id']);
        }
        return redirect()->route('admin.plates.show', $newPlate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        // $data = [
        //     'plate' => $plate,
        // ];
        return view('admin.plates.show', ["plate" => $plate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        if (Auth::user()->id != $plate->user_id) {
            abort('403');
        }

        // $plate = Plate::all();
        $tags = Tag::all();
        return view('admin.plates.edit', ['plate' => $plate, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $data = $request->all();
        if (Auth::user()->id != $plate->user_id) {
            abort('403');
        }
        $validateData = $request->validate([
            'tag_id' => 'required|exists:App\Tag,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'ingredients' => 'required',
            'visible' => 'required|boolean',
            'preview' => 'nullable|image',
        ]);

        if (!empty($data['preview'])) {
            Storage::delete($plate->preview);

            $img_path = Storage::put('uploads', $data['preview']);
            $data['preview'] = $img_path;
        }

        // Inserire controlli vari
        if ($data['name'] != $plate->name) {
            $plate->name = $data['name'];
            $plate->slug = $plate->createSlug($data['name']);
        }
        if ($data['description'] != $plate->description) {
            $plate->description = $data['description'];
        }
        if ($data['ingredients'] != $plate->ingredients) {
            $plate->ingredients = $data['ingredients'];
        }

        if ($data['price'] != $plate->price) {
            $plate->price = $data['price'];
        }

        if ($data['visible'] != $plate->visible) {
            $plate->visible = $data['visible'];
        }

        $plate->update($data);

        // Problema con il detach di tag
        if (!empty($data['tag_id'])) {
            // @dd($data);
            // $plate->tag()->sync($data['tag_id']);
            $plate->tag()->associate($data['tag_id']);
        } else {
            // $plate->tag()->dissociate($data['tag_id']);
            $plate->tag()->detach();
            //  stesso problema sul detach 
        }



        return redirect()->route('admin.plates.show', $plate)
            ->with('status', "Plate $plate->name Saved!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        if (Auth::user()->id != $plate->user_id) {
            abort('403');
        }
        // $plate->tag()->detach(); Con il detach non funziona senza funziona tutto 
        $plate->delete();

        return redirect()->route('admin.plates.index')->with('status', "Plate id $plate->id deleted");
    }
}
