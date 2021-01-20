<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Ulid\Ulid;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->string('id', 26);
            $table->string('role_name', 64)->unique();
            $table->string('role_note');
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
            $table->string('created_by');
            $table->string('updated_by');
        });

        $roles = [
            [
                'id' => (string) Ulid::generate(),
                'role_name' => 'Admin',
                'role_note' => 'Admin',
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ], [
                'id' => (string) Ulid::generate(),
                'role_name' => 'Manager',
                'role_note' => 'Manager',
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ], [
                'id' => (string) Ulid::generate(),
                'role_name' => 'User',
                'role_note' => 'User',
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ]
        ];

        DB::table('roles')->insert($roles);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
