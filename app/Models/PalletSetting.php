<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PalletSetting extends Model
{
    use HasFactory;

    protected $fillable = ['total_pallets', 'max_weight', 'min_weight'];

    public function groups()
    {
        return $this->hasMany(PalletGroup::class);
    }
}

