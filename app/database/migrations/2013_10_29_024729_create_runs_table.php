<?php

use Illuminate\Database\Migrations\Migration;

class CreateRunsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('runs', function($t)
        {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
			$t->text('map_data');  // api agnostic - should be simple coordinates to fit in with any system (google maps / mapbox / etc)
			$t->dateTime('start_time')->nullable();
			$t->dateTime('end_time')->nullable();
			$t->float('distance');
			$t->float('start_lat')->nullable();
			$t->float('start_lon')->nullable();
			$t->float('end_lat')->nullable();
			$t->float('end_lon')->nullable();

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
		Schema::drop('runs');
	}

}