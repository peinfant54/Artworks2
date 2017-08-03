<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_log', function (Blueprint $table) {
            $table->datetime('fecha');
            $table->integer('id_user')->unsigned();
            $table->string('module',20);
            $table->text('dato');
        });


        Schema::table('core_log', function($table) {
            $table->foreign('id_user')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_log');
    }
}
