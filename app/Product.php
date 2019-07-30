<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $guarded=[];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_product');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class ,'package_product');
    }
}
