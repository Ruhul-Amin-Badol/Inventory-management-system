<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable=[
        'purchaseShortID',
        'productID',
        'prodCode',
        'invNumber',
        'purchaseDate',
        'supplierID',
        'supplierName',
        'prodQty',
        'prodRate',
        'totalPrice',
    ];
}
