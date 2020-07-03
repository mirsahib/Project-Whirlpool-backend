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
            $table->string('name',50);
            $table->string('nid',50);
            $table->string('nid_img');
            $table->string('phone',50);
            $table->integer('exp_rent');
            $table->integer('paid_rent');
            $table->integer('dues');
            $table->date('pay_date');
            $table->string('comment');
            $table->integer('hrid');
            $table->string('status',10);
            $table->date('exit_date');
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
