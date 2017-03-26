<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockKeepingUnitHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_keeping_unit_history', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('sku_id')->unsigned();
            $table->string('on_hand', 255)->default('0')->nullable();
            $table->string('available', 255)->default('0')->nullable();
            $table->string('reserved', 255)->default('0')->nullable();
            $table->string('on_order', 255)->default('0')->nullable();
            $table->string('unserved', 255)->default('0')->nullable();
            $table->string('srp', 255)->default('0');
            $table->string('srp_currency', 50);
            $table->string('cost', 255)->default('0');
            $table->string('cost_currency', 50);
            $table->timestamps();

            $table->foreign('sku_id')
                    ->references('id')
                    ->on('stock_keeping_units');

            $table->foreign('srp_currency')
                    ->references('code')
                    ->on('currencies');

            $table->foreign('cost_currency')
                    ->references('code')
                    ->on('currencies'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_keeping_unit_history');
    }
}
