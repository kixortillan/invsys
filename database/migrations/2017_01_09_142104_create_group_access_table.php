<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_access', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
            $table->integer('access_id')->unsigned();
            $table->text('permission')->nullable();
            $table->timestamps();
            $table->primary(['group_id', 'access_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_access');
    }
}
