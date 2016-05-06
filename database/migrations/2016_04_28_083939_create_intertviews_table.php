<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*基线+随访*/

class CreateIntertviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intertviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->default(0)->comment('项目id-project');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->integer('research_center_id')->default(0)->comment('研究中心id');

            $table->string('name')->default('')->comment('基线，随访1，随访2...');
            $table->tinyInteger('design_status')->default(2)->comment('1-设计完成，2-设计未完成, 3-删除');
            $table->tinyInteger('interval')->unsigned()->default(0)->comment('随访间隔');
            $table->string('interval_unit')->default('日')->comment('随访间隔单位, 日，周，月');
            $table->tinyInteger('interval_remind')->unsigned()->default(0)->comment('随访浮动天数,默认单位天');

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
        Schema::drop('intertviews');
    }
}
