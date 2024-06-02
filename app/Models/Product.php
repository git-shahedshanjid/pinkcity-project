<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';


    public function product_images() {
        return $this->hasMany(Image::class);
    }

    public function product_seller() {
        return $this->belongsTo(Seller::class, 'seller');
    }





}
