<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'bulk_unit',
        'individual_unit',
        'bulk_weight',
        'individual_weight',
        'is_seasonal',
        'season_month',
        'shelf_id',
        'picture_path',
        'selling_price',
    ];

    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }
}
