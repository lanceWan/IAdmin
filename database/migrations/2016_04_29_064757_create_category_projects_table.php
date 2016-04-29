<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_projects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->default(0)->comment('项目id');
            $table->integer('category_id')->default(0)->comment('领域id');

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
        Schema::drop('category_projects');
    }
}
