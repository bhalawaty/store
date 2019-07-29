<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
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
        return $this->belongsTo(Category::class,'category_product');
    }
}
