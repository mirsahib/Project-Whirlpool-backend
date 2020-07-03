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
    public function up()
    {
        Schema::create('mother_meters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id')->unsigned();
            $table->integer('meter_num');
            $table->string('type',15);
            $table->bigInteger('consume_unit');
            $table->bigInteger('bill');
            $table->string('year',5);
            $table->string('month',15);
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants');

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
