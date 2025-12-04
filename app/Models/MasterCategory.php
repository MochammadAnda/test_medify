<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    protected $fillable = ['nama'];

    public function items()
    {
        return $this->belongsToMany(MasterItem::class, 'item_kategori', 'kategori_id', 'item_id');
    }
}
