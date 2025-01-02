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
        Schema::create('repackaging_batches', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('original_quantity');
            $table->integer('total_weight');
            $table->enum('status', ['in progress', 'completed'])->default('in progress');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repackaging_batches');
    }
};
