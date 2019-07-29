<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}