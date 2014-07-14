<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_photos', function($t)
        {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
			$t->text('path');
			$t->float('height');
			$t->float('width');
			$t->string('extension', 3);
			
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
		Schema::drop('user_photos');
	}

}