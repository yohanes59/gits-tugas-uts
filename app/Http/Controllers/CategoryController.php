<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('admin.category.index', ['kategori' => $category]);
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(CategoryRequest $request)
    {
        $newName = '';
        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->nama_kategori . '-' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('images', $newName, 'public');
        }

        $request['image'] = $newName;
        Category::create([
            'name' => $request->nama_kategori,
            'image' => $newName,
        ]);

        return redirect('/admin/category')->with('alert', 'Berhasil menambahkan category');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', ['kategori' => $category]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        // cek apa user mengupload image baru
        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->nama_kategori . '-' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('images', $newName, 'public');

            // delete gambar lama dari storage
            Storage::delete('public/images/' . $category->image);

            $category->image = $newName;
        }

        $category->name = $request->nama_kategori;
        $category->save();

        return redirect('/admin/category')->with('alert', 'Berhasil mengubah category');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::delete('public/images/' . $category->image);
        $category->delete();
        return redirect('/admin/category')->with('alert', 'Berhasil menghapus category');
    }
}
