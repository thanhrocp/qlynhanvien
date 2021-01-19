<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Ulid\Ulid;

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
            $table->string('id', 26);
            $table->string('depart_name')->unique();
            $table->string('depart_phone');
            $table->string('depart_note');
            $table->string('depart_number_persion');
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
        });

        DB::table('departments')->insert([
            'id' => (string) Ulid::generate(),
            'depart_name' => 'Phòng nhân sự',
            'depart_phone' => '0971192594',
            'depart_note' => 'Phòng nhân sự',
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
