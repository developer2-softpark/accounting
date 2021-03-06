<?php

namespace App\Models;
use App\User;
use App\Models\Category;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    } 
}
