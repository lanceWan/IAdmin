<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*随访-数据集中间表*/
class CreateDatasetInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataset_interviews', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('interview_id')->unsigned()->default(0)->comment('随访id');
            $table->integer('dataset_id')->unsigned()->default(0)->comment('数据集id');
            $table->integer('template_id')->unsigned()->default(0)->comment('模板id');

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
        Schema::drop('dataset_interviews');
    }
}
