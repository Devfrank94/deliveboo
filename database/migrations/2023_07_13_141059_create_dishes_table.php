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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 255)->unique();
            $table->string('slug' , 255)->unique();
            $table->string('image_path')->nullable();
            $table->string('image_original_name')->nullable();
            $table->decimal('price', $precision = 7, $scale = 2);
            $table->text('description');
            $table->text('ingredients');
            $table->tinyInteger('visible');
            $table->tinyInteger('vote')->nullable();
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
        Schema::dropIfExists('dishes');
    }
};
