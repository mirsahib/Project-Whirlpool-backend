<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id')->unsigned();
            $table->integer('exp_rent');
            $table->integer('paid_rent')->default(0);
            $table->integer('dues')->default(0);
            $table->string('pay_month',15);
            $table->string('pay_year',5);
            $table->boolean('pay_status')->default(0);
            $table->string('comment')->default("Earum eligendi reprehenderit impedit eveniet. Omnis et optio voluptatem dolorum non.");
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
        Schema::dropIfExists('payments');
    }
}
