<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table= 'suppliers';

    protected $fillable =[
        'supplierName',
        'supplierEmail',
        'supplierPhone',
        'supplierAddress',
        'note',
        'supplierprevioustBalance',
        'supplierCurrentBalance'
    ];    
}
