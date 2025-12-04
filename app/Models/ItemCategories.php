<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    use HasFactory;
    protected $table = 'item_kategori';

    protected $fillable = [
        'item_id',
        'kategori_id'
    ];
}
