<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\HasMany;
>>>>>>> origin/main
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'shelves';

    /**
     *
     * @var array
     */
=======
>>>>>>> origin/main
    protected $fillable = [
        'name',
        'description',
    ];

<<<<<<< HEAD
    /**

     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'shelf_id');
=======
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
>>>>>>> origin/main
    }
}
