<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
     public function show(User $user)
    {
        return view('admin.users.show', ["user" => $user]);
    }

    public function edit(User $user)
    {
        if (Auth::user()->id != $user->id) {
            abort('403');
        }
        return view('admin.users.edit', ["user" => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        if (!empty($data['logo_img'])) {
            Storage::delete($user->logo_img);

            $img_path = Storage::put('uploads', $data['logo_img']);
            $user->logo_img = $img_path;
        }
        if (!empty($data['banner_img'])) {
            Storage::delete($user->banner_img);

            $img_path = Storage::put('uploads', $data['banner_img']);
            $user->banner_img = $img_path;
        }
        $user->update();
        return redirect()->route('admin.users.show', $user)
            ->with('status', "User $user->name Edited!");
    }
}
