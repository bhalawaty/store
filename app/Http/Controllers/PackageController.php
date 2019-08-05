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

    public function index(Package $package)
    {
        $packages = Package::all();
        return view('packages.index', compact('packages', 'package'));
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

        return view('packages.package', compact('package'));

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

        return view('packages.package', compact('package'));
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

        return view('packages.package', compact('package'));

    }

    public function destroyPackage(Package $package)
    {
        $package->delete();

        return Redirect::route('all_package');
    }

    public function destroyYourPackage(Package $package)
    {
        $user=Auth::user();
        $package->Users()->detach($user);

        return back();
    }

    public function destroyModifiedPackage(Package $package)
    {
        $package->delete();

        return back();
    }

    public function showUserPackages(){
        $user=Auth::user();
        $packages=$user->packages()->get();
        return view('packages.user_delete_packages', compact('packages'));
    }


}
