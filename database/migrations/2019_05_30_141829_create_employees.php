<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->integer('user_id')->unsigned();
            $table->string('birth_date')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('identity_card')->nullable();
            $table->string('dateofissue')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('religion')->nullable();
            $table->string('nation')->nullable();
            $table->string('marital_status')->nullable();
            $table->timestamps();
        });

        DB::table('employee')->insert([
            'depart_id' => 1,
            'user_id' => 1,
            'birth_date' => '25-10-1997',
            'first_name' => 'Dư Công',
            'last_name' => 'Thành',
            'avatar' => 'https://i.pinimg.com/originals/01/48/0f/01480f29ce376005edcbec0b30cf367d.jpg',
            'gender' => '1',
            'identity_card' => '',
            'dateofissue' => '',
            'issued_by' => '',
            'religion' => '',
            'nation' => '',
            'marital_status' => ''
        ]);
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
