<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiving_reports', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('transaction_id')->unique();
            $table->string('invoice_num');
            $table->string('official_receipt_num')->nullable();
            $table->string('total_cost');
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
        Schema::dropIfExists('receiving_reports');
    }
}
