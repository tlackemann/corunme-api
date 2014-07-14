<?php

class RunController extends \BaseController {

	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$_data = Input::get();
		$_session = $_data['session'];
		
		$_newSession = $this->_checkSession($_session);
			$_runs = array();
			$_runCollection = Run::all();
			foreach($_runCollection as $_run)
			{
				$_runs[$_run->id] = $_run->toArray();
				$_runs[$_run->id]['user'] = $_run->user->toArray();
			}

			$_json = array(
				'runs' => $_runs,
				'user' => array(
					'session' => $_newSession
				)
			);
			return $this->_jsonReturn($_json, 200);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$_data = Input::get();
		$mapData = $_data['map_data'];
		$_session = $_data['session'];
		$_newSession = $this->_checkSession($_session);
		if ($this->user)
		{
			$run = new Run;
			$run->user_id = $this->user->id;
			$run->map_data = json_encode($mapData);
			$run->distance = 0.00;
			
			$run->start_time = date('Y-m-d H:i:s', $_data['start_time']);
			$run->end_time = date('Y-m-d H:i:s', $_data['end_time']);

			$i = 0;
			// Get the start and end lat/lngs
			foreach($mapData as $latlng)
			{
				if ($i == 0)
				{
					$run->start_lat = $latlng['coords']['latitude'];
					$run->start_lon = $latlng['coords']['longitude'];
				}
				elseif ($i + 1 == count($mapData))
				{
					$run->end_lat = $latlng['coords']['latitude'];
					$run->end_lon = $latlng['coords']['longitude'];
				}

				++$i;
			}

			$run->save();

			$response = array(
				'run_id'	=>	$run->id,
				'user'		=>	array(
					'session'	=>	$_newSession
				)
			);
			return $this->_jsonReturn($response, 200);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$run = Run::find($id);
		$response = array(
			'run'	=>	$run->toArray()
		);
		return $this->_jsonReturn($response, 200);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$_data = Input::get();
		$_session = $_data['session'];
		$_newSession = $this->_checkSession($_session);
		if ($this->user)
		{
			$run = Run::find($id);
			if ($run->user_id == $this->user->id)
			{
				$run->title = $_data['title'];
				$run->save();

				$response = array(
					'run_id'	=>	$run->id,
					'success'	=>	1,
					'session'	=>	$_newSession
				);
				$code = 200;
			}
			else
			{
				$response = array(
					'success'	=>	0,
					'session'	=>	$_newSession
				);
				$code = 403;
			}		
			return $this->_jsonReturn($response, $code);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}