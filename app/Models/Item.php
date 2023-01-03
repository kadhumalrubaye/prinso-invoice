<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'item_num',
        'quantity',
        'price',
        'total_price',
        'original_price',
        'original_totla_price',



    ];
    public function invoice()
    {
        $this->belongsTo(Invoice::class);
    }
}
