<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$user = User::find($id);

        return View::make('user.show', array('user' => $user));
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

	/**
	 * Login the user
	 *
	 * @return Response
	 */
	public function login()
	{
		$input = Input::get();
		$validator = Validator::make(
			$input,
		    array('email' => 'required', 'min:3'),
		    array('password' => array('required', 'min:5'))
		);

		if (!$validator->fails())
		{
			if (Auth::attempt(array('username' => $input['email'], 'password' => $input['password']), true))
			{
				return $this->_jsonReturn(array('success' => 1), 200);
			}
		}
		return $this->_jsonReturn(array('success' => 0), 200);
	}

	/**
	 * Logout the user
	 *
	 * @return Response
	 */
	public function logout()
	{

	}

	

}