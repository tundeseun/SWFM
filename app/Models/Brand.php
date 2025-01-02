<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description', 'image',
    ];

=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes; 

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'image',
    ];
>>>>>>> tundeseun/devtest
}
