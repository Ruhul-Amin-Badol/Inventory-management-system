<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPaymentList extends Model
{
    use HasFactory;
    protected $fillable = [
        'salesShortID',
        'invNumber',
        'customerID',
        'customerName',
        'paymentDate',
        'transactionMethod',
        'custPrevBalance',
        'paymentAmount',
        'duesAmount',
        'custCurrBalance',
        'note',
    ];
}
