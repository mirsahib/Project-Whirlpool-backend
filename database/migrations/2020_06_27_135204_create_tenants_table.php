<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nid');
            $table->string('nid_img');
            $table->string('phone');
            $table->string('exp_rent');
            $table->string('paid_rent');
            $table->string('dues');
            $table->string('pay_date');
            $table->string('comment');
            $table->string('hrid');
            $table->boolean('status');
            $table->date('exit');
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
        Schema::dropIfExists('tenants');
    }
}
