<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_Address extends Model
{
    use HasFactory;
    protected $table = "Shipping_Address";
    protected $primaryKey = "id";
    public $timestamps = false;
}
