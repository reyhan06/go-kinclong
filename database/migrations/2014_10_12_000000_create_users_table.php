<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('phone');
            $table->enum('type', ['admin', 'customer']);
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::transaction(
            function() {
                $now = now();
                DB::table('users')->insert([
                    [
                        'id' => 1,
                        'name' => 'Rinanda',
                        'username' => 'rinanda1707',
                        'phone' => '082258843862',
                        'type' => 'admin',
                        'email' => 'rinanda1707@gmail.com',
                        'password' => bcrypt('Secret123!'),
                        'created_at' => $now,
                        'updated_at' => $now,
                    ],
                ]);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(
            function() {
                DB::table('users')->whereIn('id', [1])->delete();
            }
        );

        Schema::dropIfExists('users');
    }
}
