<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_short extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchaseSID',
        'invNumber',
        'supplierName',
        'purchaseDate',
        'grandTotal',
        'paidAmount',
        'duesAmount',
        'note'
    ];
}
