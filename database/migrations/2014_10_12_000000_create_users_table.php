<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('真实姓名');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('mobile')->default('')->comment('手机号');
            $table->string('password',60)->comment('密码');
            $table->tinyInteger('status')->default(1)->comment("1-正常，2-禁用");
            $table->tinyInteger('confirm_email')->default(2)->comment('1-验证，2-没验证');
            $table->integer('medsci_uid')->default(0)->comment('medsci账号的id');
            $table->string('profession', 100)->default('')->comment('职业');
            $table->string('department')->default('')->comment('单位，公司名称');
            $table->string('position', 30)->default('')->comment('职称');
            $table->string('major', 30)->default('')->comment('科室，专业');
            $table->string('sign')->default('')->comment('电子签名,图片路径');
            $table->tinyInteger('complete')->comment('完成度');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
