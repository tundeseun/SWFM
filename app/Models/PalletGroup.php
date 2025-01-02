<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PalletGroup extends Model
{
    use HasFactory;

    protected $fillable = ['pallet_setting_id', 'group_name', 'categories'];

    protected $casts = [
        'categories' => 'array',
    ];

    public function palletSetting()
    {
        return $this->belongsTo(PalletSetting::class);
    }
}

