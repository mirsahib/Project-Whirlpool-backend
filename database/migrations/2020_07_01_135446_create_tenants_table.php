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
            $table->string('nid_img')->default("https://via.placeholder.com/150");
            $table->string('phone',50);
            $table->integer('exp_rent');
            $table->date('reg_date');
            $table->integer('house_id')->unsigned();
            $table->boolean('tenant_status')->default(0);
            $table->date('exit_date')->default('2020-01-01');
            $table->timestamps();
            $table->foreign('house_id')->references('id')->on('houses');
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
