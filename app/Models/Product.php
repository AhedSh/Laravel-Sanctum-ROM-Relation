<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\OrderProduct;

class Product extends Model
{
    use HasFactory;


    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class ,'product_id');
    }
}

