<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employ_work', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employ_id')->unsigned();
            $table->foreign('employ_id')->references('id')->on('employee')->onDelete('cascade'); 
            $table->string('work_code');
            $table->string('work_email');
            $table->string('probationary_day');
            $table->string('joining_date');
            $table->string('contract_type');
            $table->string('bank_account');
            $table->string('bank_name');
            $table->string('day_off');
            $table->string('reason_leave');
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
        Schema::dropIfExists('employ_work');
    }
}
