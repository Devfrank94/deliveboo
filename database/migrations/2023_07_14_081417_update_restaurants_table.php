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
        Schema::table('restaurants', function (Blueprint $table) {
            //1. Creo colonna FK
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            //2. assegno FK alla colonna creata
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::table('restaurants', function (Blueprint $table) {
        //1. Elimino FK
        $table->dropForeign(['user_id']);
        //2. Elimino la colonna
        $table->dropColumn('user_id');
        });
    }
};
