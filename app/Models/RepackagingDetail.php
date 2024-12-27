<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepackagingDetail extends Model
{
    use HasFactory;

    protected $fillable = ['batch_id', 'size', 'quantity'];

    public function batch()
    {
        return $this->belongsTo(RepackagingBatch::class, 'batch_id');
    }
}
