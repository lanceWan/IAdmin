<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unsigned()->default(0)->comment('项目id');
            $table->integer('interview_id')->unsigned()->default(0)->comment('随访id');
            $table->integer('dataset_id')->unsigned()->default(0)->comment('数据集id');
            $table->integer('template_id')->unsigned()->default(0)->comment('模板id');

            $table->string('name')->default('')->comment('数据点名称');
            $table->string('en_name')->default('')->comment('数据点英文名称-用作数据字典导出');

            $table->tinyInteger('input_type')->unsigned()->default(1)->comment('1-文本框, 2-数字型(小数和整数), 3-日期型, 4-选项性');
            $table->text('input_format')->comment('自定义类型格式,类型，单位，规则');

            $table->integer('sort')->default(1)->comment('排序');

            $table->tinyInteger('status')->unsigned()->default(1)->comment('1-正常, 2删除');
            $table->tinyInteger('initial_status')->default(1)->comment('crf初始所属, 1-项目默认的crf，2-项目参与者修改的crf');

            $table->tinyInteger('upload_status')->unsigned()->default(2)->comment('数据点后面带上上传控件，1-上传开启, 2-关闭上传');

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
        Schema::drop('crves');
    }
}
