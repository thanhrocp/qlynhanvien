<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Ulid\Ulid;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 26);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('change_password')->nullable();
            $table->string('role_id', 26);
            $table->rememberToken();
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->useCurrent();
            $table->string('created_by');
            $table->string('updated_by');
        });

        DB::table('users')->insert([
            'id' => (string) Ulid::generate(),
            'name' => config('auth.admin_login.name'),
            'email' => config('auth.admin_login.email'),
            'password' => bcrypt(config('auth.admin_login.password')),
            'role_id' => 1,
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
        Schema::dropIfExists('users');
    }
}
