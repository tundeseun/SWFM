<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;


    protected $table = 'shelves';

    /**
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'description',
    ];


    /**

     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'shelf_id');

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
