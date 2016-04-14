<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::Create('menu_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->comment('主菜单id');
            $table->integer('child_id')->default(0)->comment('子菜单id');
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
        Schema::drop('menu_relation');
    }
}
