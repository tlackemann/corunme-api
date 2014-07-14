<?php

use Illuminate\Database\Migrations\Migration;

class CreateEncouragementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('encouragements', function($t)
        {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
            $t->integer('run_id')->unsigned();

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
		Schema::drop('encouragements');
	}

}