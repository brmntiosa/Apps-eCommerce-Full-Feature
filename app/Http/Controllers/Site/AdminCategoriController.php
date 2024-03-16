<?php

namespace App\Http\Controllers\site;

use DB;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class AdminCategoriController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $categoryProductsCount = Product::select('product_category_id', DB::raw('count(*) as product_count'))
            ->groupBy('product_category_id')
            ->get()
            ->pluck('product_count', 'product_category_id');

        return view('site.admin.category', compact('categories', 'categoryProductsCount'));
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:product_categories,name',
        ]);

        ProductCategory::create([
            'name' => $request->input('category_name'),
        ]);

        return redirect()->route('site.admin.category.index')->with('success', 'Category added successfully');
    }


    public function updateCategory(Request $request, $id)
    {
        $category = ProductCategory::find($id);
        $request->validate([
            'category_name' => 'required|unique:product_categories,name,' . $id,
        ]);

        $category->update([
            'name' => $request->input('category_name'),
        ]);

        return redirect()->route('site.admin.category.index')->with('success', 'Category updated successfully');
    }

    public function deleteCategory($id)
    {
        $category = ProductCategory::find($id);

        if ($category->products()->exists()) {
            return redirect()->route('site.admin.category.index')->with('error', 'Category cannot be deleted as it contains products');
        }

        $category->delete();

        return redirect()->route('site.admin.category.index')->with('success', 'Category deleted successfully');
    }
}
