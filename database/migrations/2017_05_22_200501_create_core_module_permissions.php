<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreModulePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_module')->unsigned();
            $table->integer('id_profile')->unsigned();
            $table->boolean('rread');
            $table->boolean('wwrite');
            $table->boolean('eedit');
            $table->boolean('ddelete');
        });

        Schema::table('core_permissions', function($table) {
            $table->foreign('id_module')->references('id')->on('core_module');
            $table->foreign('id_profile')->references('id')->on('core_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_permissions');
    }
}
