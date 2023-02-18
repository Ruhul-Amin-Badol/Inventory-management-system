<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'salesSID',
        'invNumber',
        'customerID',
        'customerName',
        'purchaseDate',
        'proID',
        'prodCode',
        'prodQty',
        'prodRate',
        'totalPrice',
    ];

}
