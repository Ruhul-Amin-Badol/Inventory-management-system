<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierLedger extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplierID',
        'supplierName',
        'invNumber',
        'paymentDate',
        'particular',
        'supPrevBal',
        'paymentAmount',
        'totalBalance',
    ];

}
