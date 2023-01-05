<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'price',
        'total_price',
        'original_price',
        'total_original_price',
        'invoice_id'
    ];

    public function invoice()
    {
        $this->belongsTo(Invoice::class);
    }
}
