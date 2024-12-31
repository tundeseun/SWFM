<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\WeightCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'code', 'Type_barcode', 'name', 'cost', 'unit_id', 'unit_sale_id', 'unit_purchase_id',

        'stock_alert', 'category_id', 'sub_category_id', 'is_variant', 'is_imei',
        'tax_method', 'image', 'brand_id', 'is_active', 'note', 'type', 'stock_alert', 'TaxNet', 'stock_alert',
        'individual_units', 'bulk_weight', 'individual_weight', 'is_seasonal', 'seasonal_month', 'shelf_id',
        'images',
    ];

    protected $casts = [
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'unit_id' => 'integer',
        'unit_sale_id' => 'integer',
        'unit_purchase_id' => 'integer',
        'is_variant' => 'integer',
        'is_imei' => 'integer',
        'brand_id' => 'integer',
        'is_active' => 'integer',
        'cost' => 'double',
        // 'price' => 'double',
        'stock_alert' => 'double',
        'TaxNet' => 'double',
        'stock_alert',
        'bulk_units'=>'integer',
        'individual_units'=>'integer',
        'bulk_weight_lb'=>'double',
        'bulk_weight_oz'=>'double',
        'individual_weight_lb'=>'double',
        'individual_weight_oz'=>'double',
        'is_seasonal'=>'boolean',
        'seasonal_month'=>'boolean',
        'shelf'=>'boolean',
        'product_picture'=>'file',

    ];

    public function ProductVariant()
        'stock_alert' => 'double',
        'TaxNet' => 'double',
        'individual_units' => 'integer',
        'bulk_weight' => WeightCast::class,
        'individual_weight' => WeightCast::class,
        'is_seasonal' => 'boolean',
        'seasonal_month' => 'integer',
        'shelf_id' => 'integer',
        'images' => 'array',
    ];

    public function ProductVariant(): BelongsTo
    {
        return $this->belongsTo('App\Models\ProductVariant');
    }

    public function PurchaseDetail()
    {
        return $this->belongsTo('App\Models\PurchaseDetail');
    }

<<<<<<< HEAD
    public function SaleDetail()
=======
    public function SaleDetail(): BelongsTo
>>>>>>> origin/main
    {
        return $this->belongsTo('App\Models\SaleDetail');
    }

<<<<<<< HEAD
    public function QuotationDetail()
=======
    public function QuotationDetail(): BelongsTo
>>>>>>> origin/main
    {
        return $this->belongsTo('App\Models\QuotationDetail');
    }

<<<<<<< HEAD
    public function category()
=======
    public function category(): BelongsTo
>>>>>>> origin/main
    {
        return $this->belongsTo('App\Models\Category');
    }

<<<<<<< HEAD
    public function unit()
=======
    public function unit(): BelongsTo
>>>>>>> origin/main
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

<<<<<<< HEAD
    public function unitPurchase()
=======
    public function unitPurchase(): BelongsTo
>>>>>>> origin/main
    {
        return $this->belongsTo('App\Models\Unit', 'unit_purchase_id');
    }

<<<<<<< HEAD
    public function unitSale()
=======
    public function unitSale(): BelongsTo
>>>>>>> origin/main
    {
        return $this->belongsTo('App\Models\Unit', 'unit_sale_id');
    }

<<<<<<< HEAD
    public function brand()
=======
    public function brand(): BelongsTo
>>>>>>> origin/main
    {
        return $this->belongsTo('App\Models\Brand');
    }

<<<<<<< HEAD
     public function combinedProducts()
     {
         return $this->belongsToMany(Product::class, 'combined_products', 'product_id', 'combined_product_id')
                     ->withPivot('quantity')
                     ->withTimestamps();
     }

     public function shelf()
{
    return $this->belongsTo(Shelf::class);
}
=======
    // Relationship for products that are combined in a combo
    public function combinedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'combined_products', 'product_id', 'combined_product_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function shelf(): BelongsTo
    {
        return $this->belongsTo(Shelf::class);
    }
>>>>>>> origin/main

}
