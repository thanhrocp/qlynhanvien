<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('depart_id')->unsigned();
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('birth_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar');
            $table->string('gender');
            $table->string('identity_card');
            $table->string('dateofissue');
            $table->string('issued_by');
            $table->string('religion');
            $table->string('nation');
            $table->string('marital_status');
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
        Schema::dropIfExists('employee');
    }
}
