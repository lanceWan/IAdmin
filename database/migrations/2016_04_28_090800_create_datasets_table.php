<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*数据集*/

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('full_name')->default('')->comment('数据集全称');
            $table->string('abbr_name')->default('')->comment('数据集简称');
            $table->tinyInteger('type')->unsigned()->default(1)->comment('1-系统，2-用户自定义');
            $table->integer('user_id')->unsigned()->default(0)->comment('用户id');

            $table->tinyInteger('status')->unsigned()->default(1)->comment('1-正常，2-删除');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void     */
    public function down()
    {
        Schema::drop('datasets');
    }
}
