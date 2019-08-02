<?php

namespace App\Http\Controllers;

use App\Package;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $packages = Package::all();
        return view('index', compact('packages'));
    }

    public function store(Request $request, Product $product)
    {

        $package = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'minnumproducts' => $request->minnumproducts,
            'discount' => $request->discount,
            'category_id' => $request->category,
            'modify' => $request->modify
        ]);

        foreach ($request->products as $item) {
            $product->packages()->attach($package->id, ['product_id' => $item]);
        }

        $user = Auth::user();
        $package->users()->attach($user);

        return Redirect::route('showP.package', $package);
    }

    public function showP(Package $package)
    {

        return view('package', compact('package'));

    }

    public function show(Package $package)
    {
        $user = Auth::user();

        $package->users()->attach($user);

        return back();

    }

    public function destroy(Package $package, Product $product)
    {

        $package->products()->detach($product);

        return view('package', compact('package'));
    }

    public function add(Package $package, Product $product)
    {
//        $sum=0;
//        foreach($package->products as $product){
//            $sum+=$product->price;
//        }
        if (!$package->products()->where('product_id', $product->id)->exists()) {
            $package->products()->attach($product);
        }

        return view('package', compact('package'));

    }


}
