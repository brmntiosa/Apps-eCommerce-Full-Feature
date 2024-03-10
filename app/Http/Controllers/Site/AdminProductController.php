<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('site.admin.product', ['products' => $products]);
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        // $categories = ProductCategory::all();

        return view('site.admin.editProduct', ['product' => $product]);
        // return view('site.admin.editProduct', ['product' => $product, 'categories' => $categories]);
    }




    public function deleteProduct($id)
    {
        $product = Product::find($id);

        // Hapus gambar terkait dengan produk
        foreach ($product->productImage as $image) {
            // Dapatkan path file gambar
            $imagePath = public_path($image->url);

            // Hapus file gambar secara manual
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Hapus record gambar dari database
            $image->delete();
        }

        // Hapus produk
        $product->delete();

        return redirect()->route('site.admin.getIndex')->with('success', 'Product deleted successfully');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request->input('name'),
            // 'product_category_id' => $request->input('product_category_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('site.admin.getIndex')->with('success', 'Product updated successfully');
    }


    public function layoutAddProduct()
    {
    return view('site.admin.addProduct');
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $images[] = $imageName;
            }

        }

        // Simpan data ke database
        $product = new Product;
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');
    $product->status = $request->input('status');
    $product->product_category_id = $request->input('product_category_id'); // sertakan nilai product_category_id

    $product->save();


    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Simpan gambar ke storage
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            // Simpan data gambar ke dalam tabel product_images
            $productImage = new ProductImage([
                'product_id' => $product->id,
                'url' => 'storage/images/' . $imageName,
            ]);

            $productImage->save();
        }
    }
        return redirect()->route('site.admin.getIndex')->with('success', 'Product added successfully');
    }

    function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout.');

    }
}
