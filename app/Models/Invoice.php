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
        'discount',
        'customer_id',
        'delivery_agency_id',
        // 'item_id',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function delivery_agency()
    {
        return $this->belongsTo(DeliveryAgency::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
