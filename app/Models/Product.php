<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> tundeseun/devtest
use App\Casts\WeightCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{

    protected $dates = ['deleted_at'];

    protected $fillable = [
<<<<<<< HEAD
        'code', 'Type_barcode', 'name', 'cost', 'unit_id', 'unit_sale_id', 'unit_purchase_id',

        'stock_alert', 'category_id', 'sub_category_id', 'is_variant', 'is_imei',
        'tax_method', 'image', 'brand_id', 'is_active', 'note', 'type', 'stock_alert', 'TaxNet', 'stock_alert',
        'individual_units', 'bulk_weight', 'individual_weight', 'is_seasonal', 'seasonal_month', 'shelf_id',
        'images',
    ];
=======
        'name',
        'image',
        'Type_barcode',
        'code',
        'category_id',
        'brand_id',
        'taxNet',
        'tax_type',
        'code',
        'Type_barcode',
        'description',
        'type',
        'product_unit',
        'sale_unit',
        'purchase_unit',
        'stock_alert',
        // 'category_id',
        // 'sub_category_id',
        'is_variant',
        'is_imei',
        // 'tax_method',
        // 'brand_id',
        'is_active',
        'note',
        'bulk_weight',
        'individual_weight',
        'is_seasonal',
        'seasonal_month',
        'shelf_id',
        'not_selling',
        'has_imei_or_serial',
        'packaging_category',
        'warehouse_bulk_alert',
        'store_min_quantity',
        'store_max_quantity'
        ];
>>>>>>> tundeseun/devtest

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
<<<<<<< HEAD
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
=======
        // 'cost' => 'double',
>>>>>>> tundeseun/devtest
        'stock_alert' => 'double',
        'TaxNet' => 'double',
        'individual_units' => 'integer',
        'bulk_weight' => WeightCast::class,
        'individual_weight' => WeightCast::class,
        'is_seasonal' => 'boolean',
        'seasonal_month' => 'integer',
        'shelf_id' => 'integer',
        'images' => 'array',
<<<<<<< HEAD
=======
        'Typebarcode' => 'string',
        'code' => 'string',
        'category' => 'string',
        'brand' => 'string',
        'taxNet' => 'double',
        'tax_method' => 'string',
        'sale_unit' => 'string',
        'purchase_unit' => 'string',
        'not_selling' => 'boolean',
        'seasonal_calendar' => 'date',
        's_imei' => 'boolean',
        'packaging_category' => 'string',
        'warehouse_bulk_alert' => 'integer',
        'store_min_quantity' => 'integer',
        'store_max_quantity' => 'integer',

>>>>>>> tundeseun/devtest
    ];

    public function ProductVariant(): BelongsTo
    {
        return $this->belongsTo('App\Models\ProductVariant');
    }

<<<<<<< HEAD
    public function PurchaseDetail()
=======
    public function PurchaseDetail(): BelongsTo
>>>>>>> tundeseun/devtest
    {
        return $this->belongsTo('App\Models\PurchaseDetail');
    }

<<<<<<< HEAD
    public function SaleDetail()
    
=======
>>>>>>> tundeseun/devtest
    public function SaleDetail(): BelongsTo
    {
        return $this->belongsTo('App\Models\SaleDetail');
    }

<<<<<<< HEAD

    public function QuotationDetail()

    public function QuotationDetail(): BelongsTo

=======
    public function QuotationDetail(): BelongsTo
>>>>>>> tundeseun/devtest
    {
        return $this->belongsTo('App\Models\QuotationDetail');
    }

<<<<<<< HEAD

    public function category()

    public function category(): BelongsTo

=======
    public function category(): BelongsTo
>>>>>>> tundeseun/devtest
    {
        return $this->belongsTo('App\Models\Category');
    }

<<<<<<< HEAD

    public function unit()

    public function unit(): BelongsTo

=======
    public function unit(): BelongsTo
>>>>>>> tundeseun/devtest
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

<<<<<<< HEAD
    public function unitPurchase()

    public function unitPurchase(): BelongsTo

=======
    public function unitPurchase(): BelongsTo
>>>>>>> tundeseun/devtest
    {
        return $this->belongsTo('App\Models\Unit', 'unit_purchase_id');
    }

<<<<<<< HEAD
    public function unitSale()

    public function unitSale(): BelongsTo

=======
    public function unitSale(): BelongsTo
>>>>>>> tundeseun/devtest
    {
        return $this->belongsTo('App\Models\Unit', 'unit_sale_id');
    }

<<<<<<< HEAD
    public function brand()

    public function brand(): BelongsTo

=======
    public function brand(): BelongsTo
>>>>>>> tundeseun/devtest
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

    // Relationship for products that are combined in a combo
=======
>>>>>>> tundeseun/devtest
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

<<<<<<< HEAD
=======
    public function repackagingRules()
{
    return $this->hasMany(RepackagingRule::class);
}

public function repackagingBatches()
{
    return $this->hasMany(RepackagingBatch::class);
}

>>>>>>> tundeseun/devtest

}
