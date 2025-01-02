<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->after('unit_id', function (Blueprint $table) {
                $table->bigInteger('individual_units')->nullable();
                $table->json('bulk_weight')->nullable();
                $table->json('individual_weight')->nullable();
                $table->boolean('is_seasonal')->default(false);
                $table->integer('seasonal_month')->nullable();
                $table->foreignId('shelf_id')->nullable()->constrained('shelves')->onDelete('set null');
                $table->json('images')->nullable();
            });
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'individual_units',
                'bulk_weight',
                'individual_weight',
                'is_seasonal',
                'seasonal_month',
                'shelf_id',
                'images',
            ]);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->after('cost', function (Blueprint $table) {
                $table->decimal('price')->default(0);
            });
        });
    }
};
