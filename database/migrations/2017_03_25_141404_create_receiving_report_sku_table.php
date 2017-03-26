<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingReportSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_report_sku', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('receiving_report_id')->unsigned();
            $table->string('part_number');
            $table->string('pne_code');
            $table->string('quantity');
            $table->string('cost');
            $table->string('average_cost');
            $table->timestamps();

            $table->foreign('receiving_report_id')
                    ->references('id')
                    ->on('receiving_reports');

            $table->foreign('pne_code')
                    ->references('code')
                    ->on('part_number_extensions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receiving_report_sku');
    }
}
