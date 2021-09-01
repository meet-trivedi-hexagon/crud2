<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $fillable = [
        "name",
        "file_path",
        "qty",
        "price",
        "total",
        "created_at",
        "updated_at"
    ];
}
