<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserLoginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('logins', function($t)
        {
            $t->increments('id');
            $t->integer('user_id');
			$t->string('session');
			$t->string('ip');
			$t->string('device')->nullable();
			
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
		Schema::drop('logins');
	}

}