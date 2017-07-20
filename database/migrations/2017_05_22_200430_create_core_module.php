<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_module', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('descripcion');
            $table->integer('id_group')->unsigned();
            $table->text('links');
            $table->text('file');
            $table->text('image');
            $table->boolean('visible');
            $table->timestamps();
        });

        Schema::table('core_module', function($table) {
            $table->foreign('id_group')->references('id')->on('core_group_module');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_module');
    }
}
