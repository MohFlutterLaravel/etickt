<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_category_id');
            $table->foreign('business_category_id')->references('id')->on('business_categories');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('website')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('mobile_one')->unique();
            $table->string('mobile_two')->nullable();
            $table->string('fix')->nullable();
            $table->string('address');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('isActive')->default(0);
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
        Schema::dropIfExists('business_accounts');
    }
}
