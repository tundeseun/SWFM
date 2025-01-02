<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
=======
>>>>>>> tundeseun/devtest
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
>>>>>>> tundeseun/devtest
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

    public function products(): HasMany
    {
=======
    public function products()
    {
>>>>>>> tundeseun/devtest
        return $this->hasMany(Product::class);
    }
}
