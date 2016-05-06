<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->default(0)->comment('项目id');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->integer('patient_id')->default(0)->unsigned()->comment("患者编号id");
            $table->integer('research_center_id')->default(0)->unsigned()->comment("研究中心id");
            $table->integer('interview_id')->default(0)->unsigned()->comment("访视批次id");
            $table->integer('datadot_id')->default(0)->unsigned()->comment('crves中的自增id,数据点id');

            $table->string('origin_file_name')->default('')->comment('原先文件名');
            $table->string('file_name')->default('')->comment('文件名');
            $table->string('version')->default('')->comment("版本号");
            $table->string('file_path')->default('')->comment('文件路径');
            $table->tinyInteger('type')->default(1)->comment('文件类型:1-研究方案, 2-伦理批件，3-原始病历,4-研究者手册, 5-其他, 6-数据点上传');
            $table->string('category', 10)->default(1)->comment('文件后缀名');
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
        Schema::drop('accessories');
    }
}
