<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_model extends Model
{
    use HasFactory;
    protected $table='cart';
    protected $primaryKey='cart_id';
}
