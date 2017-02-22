<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('part_number', 255);
            $table->string('brand', 255);
            $table->string('description', 255)->nullable();
            $table->string('pne_code', 30);
            $table->boolean('is_hazardous')->default(false)->nullable();
            $table->boolean('has_expiration')->default(false)->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('catalogs');
    }
}
