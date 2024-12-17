<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('bulk_unit');
            $table->string('individual_unit');
            $table->decimal('bulk_weight', 8, 2);
            $table->decimal('individual_weight', 8, 2);
            $table->boolean('is_seasonal')->default(false);
            $table->string('season_month')->nullable();
            $table->foreignId('shelf_id')->constrained('shelves')->onDelete('cascade');
            $table->string('picture_path')->nullable();
            $table->decimal('selling_price', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
