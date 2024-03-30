<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        $currentAdmin = Auth::user(); // Mengambil admin yang sedang login
        $users = User::where('id', $currentAdmin->id)->get(); // Hanya mengambil data admin yang sedang login

        return view('site.admin.product', ['products' => $products, 'users' => $users]);
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('site.admin.editProduct', ['product' => $product]);
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);

        foreach ($product->productImage as $image) {
            $imagePath = public_path($image->url);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $product->delete();

        return redirect()->route('site.admin.getIndex')->with('success', 'Product deleted successfully');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        // Pastikan nilai 'status' yang diterima adalah salah satu dari nilai yang diizinkan
        $allowedStatus = ['active', 'non-active'];
        $status = $request->input('status');

        if (!in_array($status, $allowedStatus)) {
            // Handle kesalahan jika nilai 'status' tidak valid
            return redirect()->route('site.admin.getIndex')->with('error', 'Invalid status value');
        }

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $status,
        ]);

        return redirect()->route('site.admin.getIndex')->with('success', 'Product updated successfully');
    }


    public function layoutAddProduct()
    {
        $categories = ProductCategory::all();

        return view('site.admin.addProduct')->with(['categories' => $categories]);
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
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);

                $productImage = new ProductImage([
                    'product_id' => $product->id,
                    'url' => 'storage/images/' . $imageName,
                ]);
                $productImage->save();
            }
        }
        return redirect()->route('site.admin.getIndex')->with('success', 'Product added successfully');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}
