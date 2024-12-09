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
        Schema::create('warehouse_inventory', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->default(0);
            $table->text('description')->default(0);
            $table->integer('quantity_bulk')->default(0);
            $table->integer('quantity_units')->default(0);
            $table->foreign('shelf_number')->references('id')->on('shelves')->onDelete('set null');
            // $table->unsignedBigInteger('shelf_id')->nullable()->index();
            $table->date('last_supply_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_inventory');
    }
};
