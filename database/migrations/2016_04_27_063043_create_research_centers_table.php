<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('center_name')->default('')->comment('研究中心名称');
            $table->string('number')->default('001')->comment('研究中心编号');
            $table->integer('project_id')->default(0)->comment('项目id');
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
        Schema::drop('research_centers');
    }
}
