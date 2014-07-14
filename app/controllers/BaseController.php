<?php

class BaseController extends Controller {

	protected $_user = null;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function _checkSession($session = null)
	{
		if (!$session)
		{
			return false;
		}

		$_session = Login::where('session', '=', $session)->get()->first();

		if ($_session != null)
		{
			$_userId = $_session->user_id;

			// Generate a new session id
			$_newSession = str_random(255);
			$_session->session = $_newSession;
			$_session->save();

			$_user = User::find($_userId);

			$this->user = $_user;

			return $_newSession;
		}
		return $session;
	}

	protected function _jsonReturn($data = array(), $code = '200')
	{	
		if (!is_array($data))
		{
			return false;
		}
		$data['timestamp'] = time();
		return Response::json($data, $code);
	}

}