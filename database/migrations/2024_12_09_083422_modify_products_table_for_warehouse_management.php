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
            $table->string('bulk_units')->after('name')->nullable();
            $table->string('individual_units')->after('bulk_units')->nullable();
            $table->float('bulk_weight_lb', 8, 2)->after('individual_units')->nullable();
            $table->float('bulk_weight_oz', 8, 2)->after('bulk_weight_lb')->nullable();
            $table->float('individual_weight_lb', 8, 2)->after('bulk_weight_oz')->nullable();
            $table->float('individual_weight_oz', 8, 2)->after('individual_weight_lb')->nullable();
            $table->boolean('is_seasonal')->default(false)->after('individual_weight_oz');
            $table->string('seasonal_month')->nullable()->after('is_seasonal'); 
            $table->string('shelf')->nullable()->after('seasonal_month');
            $table->text('product_picture')->nullable()->after('shelf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
