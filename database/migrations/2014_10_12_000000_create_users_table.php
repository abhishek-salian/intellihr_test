<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create(
            [
                'name' => 'Abhi GLaDOS',
                'email' => 'abhi_glados@test.com',
                'email_verified_at' => Carbon::now(),
                'password' => 'password',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Abhi subject',
                'email' => 'abhi_subject@test.com',
                'email_verified_at' => Carbon::now(),
                'password' => 'password',
                'created_at' => Carbon::now()
            ]
        );
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
