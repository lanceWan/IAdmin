<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 项目表
 */
class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(0)->comment('创建项目的人');
            $table->string('title')->default('')->comment('项目名称');
            $table->text('desc')->comment('项目描述');
            $table->timestamp('started_at')->default(0)->comment('项目起始时间');
            $table->timestamp('ended_at')->default(0)->comment('项目结束时间');
            $table->string('department')->default('')->comment('单位，公司名称');
            $table->string('register_number')->default('')->comment('项目注册号');
            $table->string('ethics_number')->default('')->comment('项目伦理号');
            $table->tinyInteger('share')->default(2)->comment('是否共享项目:1-共享, 2-私有');
            $table->tinyInteger('status')->default(1)->comment('项目阶段:1-启动期，2-入组期，3-随访期，4-已结题，5-已退出');

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
        Schema::drop('projects');
    }
}
