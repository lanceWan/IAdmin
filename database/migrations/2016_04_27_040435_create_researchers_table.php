<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 研究者-项目-角色-研究中心
 */
class CreateResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->default(0)->comment('项目id');
            $table->integer('user_id')->default(0)->comment('用户的关联id');
            $table->integer('role_id')->default(0)->comment('用户的角色id');
            $table->integer('research_center_id')->default(0)->comment('研究中心id');
            $table->string('user_name')->default('')->comment('用户的姓名');
            $table->integer('creator_id')->default(0)->comment('创建者');
            $table->string('number')->default('00')->comment('研究者编号');
            $table->timestamp('authorized_at')->default(0)->comment('授权时间');
            $table->timestamps();
            $table->unique(['project_id', 'user_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('researchers');
    }
}
