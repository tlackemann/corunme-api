<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserOauthClients extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_oauth_clients', function($t)
        {
            $t->integer('user_id');
			$t->string('oauth_client_id');
			
        	#$t->foreign('user_id')->references('id')->on('users');
        	#$t->foreign('oauth_client_id')->references('id')->on('oauth_clients');
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
		Schema::drop('user_oauth_clients');
	}

}