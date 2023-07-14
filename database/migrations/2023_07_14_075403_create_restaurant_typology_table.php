<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_typology', function (Blueprint $table) {
                $table->unsignedBigInteger('restaurant_id');
                $table->Foreign('restaurant_id')
                        ->references('id')
                        ->on('restaurants')
                        ->cascadeOnDelete();

                $table->unsignedBigInteger('typology_id');
                $table->Foreign('typology_id')
                        ->references('id')
                        ->on('typologies')
                        ->cascadeOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_typology');
    }
};
