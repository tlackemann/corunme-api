<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('event_comments', function($t)
        {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
			$t->integer('event_id');
			$t->integer('reply_id')->nullable();
			$t->text('message');
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
		Schema::drop('event_comments');
	}

}