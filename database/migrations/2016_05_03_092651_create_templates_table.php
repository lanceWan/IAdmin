<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('模板名称');
            $table->integer('project_id')->default(0)->unsigned()->comment('项目id');
            $table->integer('interview_id')->default(0)->unsigned()->comment('随访id');
            $table->integer('user_id')->default(0)->unsigned()->comment('用户id');
            $table->integer('research_center_id')->default(0)->unsigned()->comment('研究中心id');

            $table->tinyInteger('status')->default(1)->unsigned(0)->comment('1-激活，2-未激活');
            $table->tinyInteger('share_status')->default(1)->unsigned(0)->comment('1-公共， 2-私有');
            $table->tinyInteger('initial_status')->default(1)->comment('模板初始所属, 1-项目默认的模板，2-项目参与者修改的模板');

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
        Schema::drop('templates');
    }
}
