<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'subCategoryName',
        'subCategoryCode',
        'created_at',
        'updated_at'
    ];
}
