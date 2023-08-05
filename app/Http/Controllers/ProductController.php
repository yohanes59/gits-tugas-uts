<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->paginate(10);
        return view('admin.product.index', ['produk' => $product]);
    }

    public function create()
    {
        $category = Category::get();
        return view('admin.product.add', ['kategori' => $category]);
    }

    public function store(ProductRequest $request)
    {
        $newName = '';
        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->nama_produk . '-' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('images', $newName, 'public');
        }

        $request['image'] = $newName;
        Product::create([
            'category_id' => $request->kategori_produk,
            'name' => $request->nama_produk,
            'price' => $request->harga,
            'description' => $request->deskripsi,
            'image' => $newName,
        ]);

        return redirect('/admin/product')->with('alert', 'Berhasil menambahkan product');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::get();

        return view('admin.product.edit', ['produk' => $product, 'kategori' => $category]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->file('gambar')) {
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->nama_produk . '-' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('images', $newName, 'public');

            // delete gambar lama dari storage
            Storage::delete('public/images/' . $product->image);

            $product->image = $newName;
        }

        $data = [
            'category_id' => $request->kategori_produk,
            'name' => $request->nama_produk,
            'price' => $request->harga,
            'description' => $request->deskripsi,
        ];

        $product->update($data);

        return redirect('/admin/product')->with('alert', 'Berhasil mengubah product');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/images/' . $product->image);
        $product->delete();
        return redirect('/admin/product')->with('alert', 'Berhasil menghapus product');
    }
}