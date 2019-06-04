<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploycontact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employ_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employ_id')->unsigned();
            $table->foreign('employ_id')->references('id')->on('employee')->onDelete('cascade');
            $table->string('ct_phone')->nullable();
            $table->string('ct_email')->nullable();
            $table->string('ct_yahoo')->nullable();
            $table->string('ct_zalo')->nullable();
            $table->string('ct_skype')->nullable();
            $table->string('ct_other')->nullable();
            $table->string('ct_facebook')->nullable();
            $table->string('ct_nationality')->nullable();
            $table->string('ct_city')->nullable();
            $table->string('ct_town')->nullable();
            $table->string('ct_village')->nullable();
            $table->string('ct_address')->nullable();
            $table->string('ct_name_fl')->nullable();
            $table->string('ct_rlts_fl')->nullable();
            $table->string('ct_phone_fl')->nullable();
            $table->string('ct_address_fl')->nullable();
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
        Schema::dropIfExists('employ_contact');
    }
}
