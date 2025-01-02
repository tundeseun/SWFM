<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalletSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('pallet_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('total_pallets');
            $table->decimal('max_weight', 8, 2);
            $table->decimal('min_weight', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pallet_settings');
    }
}
