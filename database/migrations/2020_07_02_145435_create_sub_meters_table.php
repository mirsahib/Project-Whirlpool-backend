<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_meters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mother_meter_id')->unsigned();
            $table->bigInteger('prev_reading');
            $table->bigInteger('curr_reading');
            $table->bigInteger('consume_unit');
            $table->bigInteger('bill');
            $table->string('year',5);
            $table->string('month',15);
            $table->string('pay_stat',10);
            $table->timestamps();

            $table->foreign('mother_meter_id')->references('id')->on('mother_meters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_meters');
    }
}
