<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepackagingRule extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'size'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
