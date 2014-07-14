<?php

use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('challenges', function($t)
        {
            $t->increments('id');
			$t->integer('user_id')->unsigned();
			$t->integer('run_id')->unsigned();
			$t->integer('condition_id');
			$t->text('message')->nullable();
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
		Schema::drop('challenges');
	}

}