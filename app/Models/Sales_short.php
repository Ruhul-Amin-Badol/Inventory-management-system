<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_short extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'salesShortID',
        'invNumber',
        'customerName',
        'salesDate',
        'grandTotal',
        'paidAmount',
        'duesAmount',
        'note',
    ];
}
