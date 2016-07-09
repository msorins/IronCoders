
<?php
require $_SERVER['DOCUMENT_ROOT'].'/auth/vendor/autoload.php';

require  $_SERVER['DOCUMENT_ROOT'].'/auth/dotenv-loader.php';

 $auth0 = new \Auth0\SDK\Auth0(array(
    'domain'        => getenv('AUTH0_DOMAIN'),
    'client_id'     => getenv('AUTH0_CLIENT_ID'),
    'client_secret' => getenv('AUTH0_CLIENT_SECRET'),
    'redirect_uri'  => getenv('AUTH0_CALLBACK_URL')
  ));


  $userInfo = $auth0->getUser();

  if(!$userInfo)
		$user_name=NULL;
	else
	{
		$user_name=$userInfo['nickname'];
		$user_id=$userInfo['user_id'];
		//$user_rang=$user->data['user_rang'];
		//$user_cursuri_terminate=$user->data['user_cursuri_terminate'];
	}
?>
