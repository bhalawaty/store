<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected  $guarded=[];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'package_product');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'package_user');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
//
//    public function discount(){
//
//        $sum=0;
//        foreach($this->products() as $product){
//            $sum+=$product->price;
//        }
//        return $sum;
//    }
}
