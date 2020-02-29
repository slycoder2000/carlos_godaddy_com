<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('days')->nullable();
            $table->string('starttime')->nullable();
            $table->string('endtime')->nullable();
            $table->string('notes')->nullable();
            $table->string('notes2')->nullable();
            $table->string('cityref');
            $table->string('calcDay1')->nullable();
            $table->string('calcDayNum1')->nullable();
            $table->string('calcDay2')->nullable();
            $table->string('calcDayNum2')->nullable();
            $table->string('calcDay3')->nullable();
            $table->string('calcDayNum3')->nullable();
            $table->string('calcDay4')->nullable();
            $table->string('calcDayNum4')->nullable();
            $table->string('calcDay5')->nullable();
            $table->string('calcDayNum5')->nullable();
            $table->string('calcDay6')->nullable();
            $table->string('calcDayNum6')->nullable();
            $table->string('calcDay7')->nullable();
            $table->string('calcDayNum7')->nullable();
            
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
        Schema::dropIfExists('food_banks');
    }
}