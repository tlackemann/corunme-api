<?php

class OauthController extends \BaseController {

	/**
	 * Index action
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Generates and returns a token for the client
	 *
	 * @return Response
	 */
	public function login()
	{
		$user = Auth::user();
		dd ($user->toArray());
		if ($user)
		{
			dd($user);
							$oauthClients = $user->oauthClients();

				// // Create an OAuth client id and secret if we don't have one
				// if (empty($oauthClients))
				// {
				// 	$_oauthClientId = str_random(40);
				// 	$_oauthSecret = str_random(40);
				// 	// Insert into the oauth_clients table
				// 	$oauthClients = DB::table('oauth_clients')->insert(
				// 		array(
				// 			'id' => $_oauthClientId,
				// 			'secret' => $_oauthSecret,
				// 			'name' => 'Corun.me API for Mobile Application',
				// 			'auto_approve' => 1
				// 		)
				// 	);
				// 	// Update our key-index table
				// 	$users = DB::table('user_oauth_clients')->insert(
				// 		array(
				// 			'user_id' => $user->id,
				// 			'oauth_client_id' => $_oauthClientId
				// 		)
				// 	);
				// }
		}
	}

	/**
	 * Generates and returns a token for the client
	 *
	 * @return Response
	 */
	public function token()
	{
		//
		$dsn      = 'mysql:dbname=corunme_api;host=localhost';
		$username = 'root';
		$password = 'root';
		$storage = new OAuth2\Storage\Pdo(array(
		    'dsn' => $dsn,
		    'username' => $username,
		    'password' => $password
		));

		$server = new OAuth2\Server($storage);

		$server->addGrantType(new OAuth2\GrantType\UserCredentials($storage)); // or any grant type you like!
		$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
		return $server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
	}	

}