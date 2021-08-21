<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_infos', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('trade_code');
            $table->unsignedDecimal('high',10,2);
            $table->unsignedDecimal('low',10,2);
            $table->unsignedDecimal('open',10,2);
            $table->unsignedDecimal('close',10,2);
            $table->integer('volume');
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
        Schema::dropIfExists('trade_infos');
    }
}
