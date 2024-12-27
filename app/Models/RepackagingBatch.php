<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepackagingBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'original_quantity',
        'total_weight',
        'status',
        'started_at',
        'completed_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function details()
    {
        return $this->hasMany(RepackagingDetail::class, 'batch_id');
    }
}
