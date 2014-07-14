<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('events', function($t)
        {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
			$t->string('name');
			$t->text('location');
			$t->text('description')->nullable();
			$t->dateTime('event_start')->nullable();
			$t->dateTime('event_end')->nullable();
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
		Schema::drop('events');
	}

}