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

    //protected $fillable = ['meter_number','hrid','type','prev_reading','curr_reading','consume_unit','bill_amount','year','month','pay_status'];

    public function up()
    {
        Schema::create('sub_meters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assign_meter_num');
            $table->unsignedInteger('rid');//home or room no
            $table->string('type');
            $table->string('prev_reading');
            $table->string('curr_reading');
            $table->string('consumeny_unit');
            $table->string('bill_amount');
            $table->string('year');
            $table->string('month');
            $table->string('pay_status');
            $table->timestamps();

            $table->foreign('assign_meter_num')->references('meter_number')->on('mother_meters');
            $table->foreign('rid')->references('assign_hrid')->on('mother_meters');

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
