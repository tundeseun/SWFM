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
        Schema::create('repackaging_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('repackaging_batches')->onDelete('cascade');
            $table->integer('size'); // Size of the repackaged product
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repackaging_details');
    }
};
