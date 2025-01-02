<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalletGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('pallet_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pallet_setting_id')->constrained('pallet_settings')->onDelete('cascade');
            $table->string('group_name');
            $table->json('categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pallet_groups');
    }
}
