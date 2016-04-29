<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*病例表*/

class CreateCasehistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casehistories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unsigned()->default(0)->comment('项目id');
            $table->integer('interview_id')->unsigned()->default(0)->comment('随访id');
            $table->integer('dataset_id')->unsigned()->default(0)->comment('数据集id');
            $table->integer('patient_id')->unsigned()->default(0)->comment('患者id');
            $table->integer('user_id')->unsigned()->default(0)->comment('用户id');

            $table->text('data')->comment('患者关于项目下面的随访中数据集中的数据,其中附件使用attach作为最外层外键');
            $table->tinyInteger('complete')->unsigned()->default(2)->comment('1-数据录入完整, 2-数据录入不完整');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('1-正常， 2-删除');

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
        Schema::drop('casehistories');
    }
}
