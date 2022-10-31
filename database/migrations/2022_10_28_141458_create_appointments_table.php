<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_account_id');
            $table->foreign('business_account_id')->references('id')->on('business_accounts');
            $table->string('title');
            $table->integer('max_orders');
            $table->boolean('isActive')->default(0);
            $table->date('valid_from');
            $table->date('valid_to');
            $table->time('order_start_time', $precision = 0);
            $table->time('order_end_time', $precision = 0);
            $table->json('workdays');
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
        Schema::dropIfExists('appointments');
    }
}
