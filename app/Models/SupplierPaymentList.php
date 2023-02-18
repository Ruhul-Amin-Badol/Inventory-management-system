<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPaymentList extends Model
{
    use HasFactory;

            protected $fillable = [
                'purchaseSID',
                'invNumber',
                'supplierID',
                'supplierName',
                'paymentDate',
                'transactionMethod',
                'supplierPrevBalance',
                'paymentAmount',
                'duesAmount',
                'supplierCurrentBalance',
                'note'
            ];

}
