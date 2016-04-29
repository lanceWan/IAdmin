<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*患者表*/
class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->default('')->comment("患者姓名");
            $table->string('mobile')->default('')->comment("患者手机");
            $table->string('email')->default('')->comment("患者邮箱");
            $table->string('number')->default('')->comment('患者编号');

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
        Schema::drop('patients');
    }
}
