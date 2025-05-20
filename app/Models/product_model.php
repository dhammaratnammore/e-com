<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_model extends Model
{
    use HasFactory;
    protected $table='products';
    public function category()
    {
        return $this->belongsTo(category_model::class);
    }
}
