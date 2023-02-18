<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLedger extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'customerID',
        'customerName',
        'invNumber',
        'paymentDate',
        'particular',
        'purchaseAmount',
        'paidAmount',
        'totalBalance',
    ];
}
