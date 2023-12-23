<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class ,'order_id');
    }

}