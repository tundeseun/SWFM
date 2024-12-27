<?php

namespace App\Models;

use App\Casts\WeightCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{

    protected $dates = ['deleted_at'];

    protected $fillable = [
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
        // 'cost' => 'double',
        'stock_alert' => 'double',
        'TaxNet' => 'double',
        'individual_units' => 'integer',
        'bulk_weight' => WeightCast::class,
        'individual_weight' => WeightCast::class,
        'is_seasonal' => 'boolean',
        'seasonal_month' => 'integer',
        'shelf_id' => 'integer',
        'images' => 'array',
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

    ];

    public function ProductVariant(): BelongsTo
    {
        return $this->belongsTo('App\Models\ProductVariant');
    }

    public function PurchaseDetail(): BelongsTo
    {
        return $this->belongsTo('App\Models\PurchaseDetail');
    }

    public function SaleDetail(): BelongsTo
    {
        return $this->belongsTo('App\Models\SaleDetail');
    }

    public function QuotationDetail(): BelongsTo
    {
        return $this->belongsTo('App\Models\QuotationDetail');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }

    public function unitPurchase(): BelongsTo
    {
        return $this->belongsTo('App\Models\Unit', 'unit_purchase_id');
    }

    public function unitSale(): BelongsTo
    {
        return $this->belongsTo('App\Models\Unit', 'unit_sale_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo('App\Models\Brand');
    }

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

    public function repackagingRules()
{
    return $this->hasMany(RepackagingRule::class);
}

public function repackagingBatches()
{
    return $this->hasMany(RepackagingBatch::class);
}


}
