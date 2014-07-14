<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($t)
        {
            $t->increments('id');
			$t->integer('role_id');
			$t->string('username', 25);
			$t->string('password');
			$t->string('email');
			$t->boolean('forgot_password')->default(0);
			$t->string('reset_token', 32)->nullable();
			$t->dateTime('last_login')->nullable();
			
			// created_at, updated_at DATETIME
			$t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');
	}

}