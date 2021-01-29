<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Ulid\Ulid;

class CreateDepartmentsTable extends Migration
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
            $table->string('department_name')->unique();
            $table->string('department_phone');
            $table->string('department_number_person');
            $table->string('department_note')->nullable();
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
            $table->string('created_by');
            $table->string('updated_by');
        });

        DB::table('departments')->insert([
            'id' => (string) Ulid::generate(),
            'department_name' => 'Phòng nhân sự',
            'department_phone' => '0971192594',
            'department_note' => 'Phòng nhân sự',
            'department_number_person' => '10',
            'created_by' => 'SYSTEM',
            'updated_by' => 'SYSTEM',
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
