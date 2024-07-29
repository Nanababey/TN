<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = "checkout";

    protected $fillable = [
        "name",
        "email",
        "phone_number",
        "address",
        "user_id",
        "price",
        "status",
        
    ];

    public $timestamps = true;
}
