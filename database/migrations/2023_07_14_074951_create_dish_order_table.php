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
        Schema::create('dish_order', function (Blueprint $table) {

            //questa è la relazione con la tabella dishes
            $table->unsignedBigInteger('dish_id');

            //creo la fk
            $table->foreign('dish_id')
                    ->references('id')
                    ->on('dishes')
                    ->cascadeOnDelete();

            //questa è la relazione con la tabella orders
            $table->unsignedBigInteger('order_id');

            //creo la fk
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders');

            //quantità piatti
            $table->integer('dish_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_order');
    }
};
