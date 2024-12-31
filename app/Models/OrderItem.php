<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_order_id',
        'product_id',
        'quantity_units',
        'quantity_bulk',
        'total_weight',
        'subunit',
        'comments'
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
