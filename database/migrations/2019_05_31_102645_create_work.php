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
            $table->string('work_code')->nullable();
            $table->string('work_email')->nullable();
            $table->string('probationary_day')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('day_off')->nullable();
            $table->string('reason_leave')->nullable();
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
