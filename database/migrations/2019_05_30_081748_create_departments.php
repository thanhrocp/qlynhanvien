<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('depart_name')->unique();
            $table->string('depart_phone');
            $table->string('depart_note');
            $table->string('depart_number_persion');
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
        });

        DB::table('departments')->insert([
            'depart_name' => 'Phòng nhân sự',
            'depart_phone' => '0971192594',
            'depart_note' => 'Phòng nhân sự',
            'depart_number_persion' => '10',
        ], [
            'depart_name' => 'Phòng hành chính',
            'depart_phone' => '0971192594',
            'depart_note' => 'Phòng hành chính',
            'depart_number_persion' => '10',
        ], [
            'depart_name' => 'Phòng bảo vệ',
            'depart_phone' => '0971192594',
            'depart_note' => 'Phòng bảo vệự',
            'depart_number_persion' => '10',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
