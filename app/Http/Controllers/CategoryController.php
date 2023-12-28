<?php

namespace App\Http\Controllers;

use App\Models\Categore;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Categore::get();
        return view('admin.category', compact('categorys'));
    }
    public function add()
    {

        return view('admin.category_add');
    }
    public function delete($id)
    {
        $category = Categore::FindOrFail($id)->delete();
        return redirect()->route('category_view');
    }
    public function edit($id)
    {
        $category = Categore::FindOrFail($id);
        return view('admin.category_edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = Categore::FindOrFail($request->id);
        $request->validate([

            'name' => ['required', 'string', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:3', 'max:250'],
            'img' => ['nullable', 'image', 'mimes:png,jpg', 'max:2024']
        ]);
        if ($category->name == $request->name) {
            if ($category->img == $request->img) {


                $category->description = $request->description;
                $category->save();
            } else {
                $fileName = time() . $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('images', $fileName, 'public');
                $lam = '/storage/' . $path;
                $category->description = $request->description;
                $category->img = $lam;
                $category->save();
            }
        } else {
            if ($category->img == $request->img) {

                $category->name = $request->name;
                $category->description = $request->description;
                $category->save();
            } else {
                $fileName = time() . $request->file('img')->getClientOriginalName();
                $path = $request->file('img')->storeAs('images', $fileName, 'public');
                $lam = '/storage/' . $path;
                $category->name = $request->name;
                $category->description = $request->description;
                $category->img = $lam;
                $category->save();
            }
        }
        return redirect()->route('category_view');
    }

    public function create(Request $request)
    {

        $request->validate([

            'name' => ['required', 'string', 'unique:categores', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:3', 'max:250'],
            'img' => ['required', 'image', 'mimes:png,jpg', 'max:2024']
        ]);
        $fileName = time() . $request->file('img')->getClientOriginalName();
        $path = $request->file('img')->storeAs('images', $fileName, 'public');
        $lam = '/storage/' . $path;
        Categore::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $lam
        ]);
        return redirect()->route('category_view');
    }
}
