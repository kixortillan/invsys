<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockKeepingUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_keeping_units', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('part_number', 255);
            $table->string('brand', 100);
            $table->string('description', 255)->nullable();
            $table->string('pne_code', 30);
            $table->boolean('is_hazardous')->default(false)->nullable();
            $table->boolean('has_expiration')->default(false)->nullable();
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
            $table->softDeletes();

            $table->foreign('pne_code')
                    ->references('code')
                    ->on('part_number_extensions');

            $table->foreign('brand')
                    ->references('name')
                    ->on('part_brands');

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
        Schema::dropIfExists('stock_keeping_units');
    }
}
