<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Package;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function index()
    {
        return view('admin.admin.index');
    }

    public function create()
    {
        return view('admin.admin.create_product');
    }

    public function store(ProductRequest $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'admin_id' => Auth::guard('admins')->id()
        ]);

        return back();
    }

    public function createCategory()
    {
        $products = Product::all();

        return view('admin.admin.create_category', compact('products'));
    }

    public function storeCategory(CategoryRequest $request,Product $product)
    {
       $category=Category::create([
            'name' => $request->name,
            'admin_id' => Auth::guard('admins')->id()
        ]);

        foreach ($request->products as $item) {
            $product->categories()->attach($category->id, ['product_id' => $item]);
        }


        return back();
    }

    public function createPackage()
    {
        $packages = Package::all();
        $products = Product::all();
        $categories = Category::all();

        return view('admin.admin.create_package', compact('categories', 'packages', 'products'));
    }

    public function storePackage(Request $request, Product $product)
    {
        $package = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'minnumproducts' => $request->minnumproducts,
            'discount' => $request->discount,
            'admin_id' => Auth::guard('admins')->id(),
            'category_id' => $request->category
        ]);
        foreach ($request->products as $item) {
            $product->packages()->attach($package->id, ['product_id' => $item]);
        }

        return back();
    }


}
