<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quantity_in_bulk',
        'quantity_in_units',
        'shelf_number',
        'last_supply_date',
        
    ];

}
