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
        'code', 'Type_barcode', 'name', 'cost', 'unit_id', 'unit_sale_id', 'unit_purchase_id',
        'stock_alert', 'category_id', 'sub_category_id', 'is_variant', 'is_imei',
        'tax_method', 'image', 'brand_id', 'is_active', 'note', 'type', 'stock_alert', 'TaxNet', 'stock_alert',
        'individual_units',
        'bulk_weight',
        'individual_weight',
        'is_seasonal',
        'seasonal_month',
        'shelf_id',
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

}
