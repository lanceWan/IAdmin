<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_interviews', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unsigned()->default(0)->comment('项目id');
            $table->integer('interview_id')->unsigned()->default(0)->comment('随访id');
            $table->integer('patient_id')->unsigned()->default(0)->comment('患者id');
            $table->integer('user_id')->unsigned()->default(0)->comment('用户id');
            $table->integer('research_center_id')->unsigned()->default(0)->comment('研究中心id');
            $table->tinyInteger('complete')->unsigned()->default(0)->comment('随访完成度');

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
        Schema::drop('patient_interviews');
    }
}
