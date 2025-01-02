<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('packaging_category')->nullable()->after('name');
            $table->integer('warehouse_bulk_alert')->nullable()->after('packaging_category');
            $table->integer('store_min_quantity')->nullable()->after('warehouse_bulk_alert');
            $table->integer('store_max_quantity')->nullable()->after('store_min_quantity'); 
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['packaging_category', 'warehouse_bulk_alert', 'store_min_quantity', 'store_max_quantity']);
        });
    }
};
