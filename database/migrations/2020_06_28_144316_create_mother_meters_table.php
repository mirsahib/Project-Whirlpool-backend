<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //protected $fillable = ['meter_number','hrid','type','consume_unit','bill_amount','year','month','pay_status'];

    public function up()
    {
        Schema::create('mother_meters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meter_number')->index();
            $table->unsignedInteger('assign_hrid')->index();//home or room no
            $table->string('type');
            $table->string('consume_unit');
            $table->string('bill_amount');
            $table->string('year');
            $table->string('month');
            $table->string('pay_status');
            $table->timestamps();


            $table->foreign('assign_hrid')->references('hrid')->on('tenants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mother_meters');
    }
}
