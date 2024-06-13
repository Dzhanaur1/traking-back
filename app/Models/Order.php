<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_location',
        'to_location',
        'date',
        'time',
        'type_of_transport',
        'type_of_cargo',
        'status',
        'phone',
        'price',
    ];
}
