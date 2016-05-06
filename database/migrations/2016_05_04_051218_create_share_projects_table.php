<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_projects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->default(0)->unsigned()->comment('项目id');
            $table->tinyInteger('status')->default(1)->unsigned()->comment('1-正常， 2-删除');

            $table->integer('research_center_number')->unsigned()->default(1)->comment('研究点数据量');
            $table->integer('cashhistory_number')->unsigned()->default(1)->comment('病例数量');

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
        Schema::drop('share_projects');
    }
}
