<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientChangeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_change_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unsigned()->default(0)->comment('项目id');
            $table->integer('patient_id')->unsigned()->default(0)->comment('患者id');
            $table->integer('old_user_id')->unsigned()->default(0)->comment('原用户id');
            $table->integer('new_user_id')->unsigned()->default(0)->comment('新用户id');

            $table->timestamp('changed_at')->default(0)->comment('转移时间');

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
        Schema::drop('patient_change_logs');
    }
}
