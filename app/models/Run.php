<?php

class Run extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'runs';

	/**
	 * Fillable attributes - prevent mass-assignment	
	 *
	 * @var array
	 */
	protected $fillable = array('id', 'user_id');

	/**
	 * Runs
	 *
	 * @return
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}