<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    // use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'servicing_products';
}
