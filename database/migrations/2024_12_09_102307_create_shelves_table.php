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
        Schema::create('shelves', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
=======
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            });
>>>>>>> origin/main
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelves');
    }
};
