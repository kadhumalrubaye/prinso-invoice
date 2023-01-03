<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'payment_status',
        'delivery_price',
        'total_price',
        'payment_status',
        'note',
        'customer_id',
        'item_id',
        'discount',
        'delivery_agency_id',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
