<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObraFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_obra_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_obra')->unsigned();
            $table->text('name');
            $table->timestamps();
        });

        Schema::table('sys_obra_file', function ($table){
            $table->foreign('id_obra')->references('id')->on('sys_obra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_obra_file');
    }
}
