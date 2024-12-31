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
            $table->string('product_name');
            $table->text('description');
            $table->integer('quantity_bulk');
            $table->integer('quantity_units');
            // Add the 'shelf_number' column
            $table->unsignedBigInteger('shelf_number')->nullable();
            // Define the foreign key constraint after the column is added
            $table->foreign('shelf_number')->references('id')->on('shelves')->onDelete('set null');
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
