<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "orderdetail";

    protected $fillable = [
        "checkout_id",
        "user_id",
        "food_id",
        "name",
        "image",
        "price",

    ];

    public $timestamps = true;
}
