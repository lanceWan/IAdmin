<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_patients', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unsigned()->default(0)->comment('项目id');
            $table->integer('user_id')->unsigned()->default(0)->comment('用户id');
            $table->integer('patient_id')->unsigned()->default(0)->comment('病例id');
            $table->integer('from_research_center_id')->unsigned()->default(0)->comment('来源于哪个研究中心');
            $table->integer('to_research_center_id')->unsigned()->default(0)->comment('共享给哪个研究中心');

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
        Schema::drop('share_patients');
    }
}
