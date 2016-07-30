<?php
session_start();
if(defined("ROOT")==0)
	define("ROOT", "/home/ironcoders/domains/junior.ironcoders.com/public_html");
if(defined("PROJ_NAME")==0)
	define("PROJ_NAME", "JuniorCoders");

//FACEBOOK & GOOGLE auth dependencies
require_once ROOT.'/scripts/Facebook/autoload.php';
require_once ROOT.'/scripts/Google/src/Google_Client.php';
require_once ROOT.'/scripts/Google/src/contrib/Google_Oauth2Service.php';

//FACEBOOK API Data
define("FB_app_id","544250009068760");
define("FB_secret","7fee79fcc101a4bfbaed64f7fc01dc86");
define("FB_graph_version","v2.5");

//GOGOLE API DATA
define("GOOGLE_app_name","JuniorCoders");
define("GOOGLE_client_id","387165938194-g78lvf8hvrkfnmvbs168igp2msahkfgm.apps.googleusercontent.com");
define("GOOGLE_client_secret","tqFRTxAfMPEMxRgz2lQv3WR_");
define("GOOGLE_redirect_url","http://junior.ironcoders.com/scripts/class_core.php?type=google_callback");

//Other Stuff
define("DB_name","juniorcoders");

class user
{
	public $_id;
	public $name;
	public $email;
	public $type; //FB sau GOOGLE
	public $profile_link;
	public $profile_picture;
	public $rang;
}

class user_no_id
{
	public $name;
	public $email;
	public $type; //FB sau GOOGLE
	public $profile_link;
	public $profile_picture;
	public $rang;
}

if(class_exists("class_core")==0)
{
	class class_core
	{
		public function __construct()
		{	
			$type=NULL;
			if(isset($_GET["type"]))
				$type=$_GET["type"];
			if($type=="fb_login")
				$this->fb_login();
			if($type=="fb_callback")
				$this->fb_callback();
			if($type=="google_login")
				$this->google_login();
			if($type=="google_callback")
				$this->google_callback();
			if($type=="classic_register")
				$this->classic_register();
			if($type=="classic_login")
				$this->classic_login();
			if($type=="logout")
				$this->logout();
		}
		
		//FACEBOOK LOGIN PART
		
		public function fb_login()
		{

			$fb = new Facebook\Facebook([
			  'app_id' => FB_app_id,
			  'app_secret' => FB_secret,
			  'default_graph_version' => FB_graph_version,
			  ]);

			$helper = $fb->getRedirectLoginHelper();

			$permissions = ['email']; // Optional permissions
			$loginUrl = $helper->getLoginUrl('http://junior.ironcoders.com//scripts/class_core.php?type=fb_callback', $permissions);
			
			
			echo '<a href="' . $loginUrl . '"><img class="ui centered medium image" style="height=65px; width:250px;" src="../img/fb_login.png"></a></a>';
		}
		
		public function fb_callback()
		{
			$fb = new Facebook\Facebook([
			  'app_id' => FB_app_id,
			  'app_secret' => FB_secret,
			  'default_graph_version' => FB_graph_version,
			  ]);
			  
			$helper = $fb->getRedirectLoginHelper();
			try {
			  $accessToken = $helper->getAccessToken();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}

			if (isset($accessToken)) {
			  // Logged in!
			  $_SESSION['facebook_access_token'] = (string) $accessToken;
			  
			  echo "logat";

			  // Now you can redirect to another page and use the
			  // access token from $_SESSION['facebook_access_token']
			  
			$token=$_SESSION['facebook_access_token'];
			$response = $fb->get('/me?fields=id,name,email,link,picture.width(100).height(100)', $token);
			$user = $response->getGraphUser();
			
			$user_export = new user();
			$user_export->_id=$user['id'];
			$user_export->name=$user['name'];
			$user_export->email=$user['email'];
			$user_export->profile_link=$user['link'];
			$user_export->profile_picture=$user['picture']['url'];
			$user_export->type="FB";

			$this->add_new_user($user_export);
			$this->login_user($user_export);
			}
		}
		
		//GOOGLE LOGIN PART
		
		public function google_login()
		{				   		
			$gClient = new Google_Client();
			$gClient->setApplicationName(GOOGLE_app_name);
			$gClient->setClientId(GOOGLE_client_id);
			$gClient->setClientSecret(GOOGLE_client_secret);
			$gClient->setRedirectUri(GOOGLE_redirect_url);
			
			$google_oauthV2 = new Google_Oauth2Service($gClient);
			$authUrl = $gClient->createAuthUrl();
			echo '<a class="login" href="'.$authUrl.'"><img class="ui centered medium image" style="height=65px; width:250px;" src="../img/google_login.png"></a>';
		}
		
		public function google_callback()
		{	
			$gClient = new Google_Client();
			$gClient->setApplicationName(GOOGLE_app_name);
			$gClient->setClientId(GOOGLE_client_id);
			$gClient->setClientSecret(GOOGLE_client_secret);
			$gClient->setRedirectUri(GOOGLE_redirect_url);
			
			
			$google_oauthV2 = new Google_Oauth2Service($gClient);
			
			if (isset($_GET['code'])) 
			{ 
				$gClient->authenticate($_GET['code']);
				$_SESSION['token'] = $gClient->getAccessToken();
				header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
			}


			if (isset($_SESSION['token'])) 
			{ 
				$gClient->setAccessToken($_SESSION['token']);
			}


			if ($gClient->getAccessToken()) 
			{
				  //For logged in user, get details from google using access token
				  $user 				= $google_oauthV2->userinfo->get();
				  $user_export = new user();
				  $user_export->_id 				= $user['id'];
				  $user_export->name			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
				  $user_export->email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
				  $user_export->profile_link 			= filter_var($user['link'], FILTER_VALIDATE_URL);
				  $user_export->profile_picture 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
				  $user_export->type 	= 'GOOGLE';
				  //$personMarkup 		= "$email<div><img src='$user_export->profile_picture?sz=50'></div>";
				  $_SESSION['token'] 	= $gClient->getAccessToken();

				  $this->add_new_user($user_export);
				  $this->login_user($user_export);
			}
		}
		
		//User register , on form, no GOGOLE / FACEBOOK
		public function classic_register()
		{
			$user_export = new user_no_id();
			
			$user_export->name = $_POST["name"];
			$user_export->email =$_POST["email"];
			$user_export->password = $_POST["password"];
			$user_export->type = "CLASSIC";
			
			$this->add_new_user($user_export);
			$this->login_user($user_export);
		}
		
		//User login , on form, no GOGOLE / FACEBOOK
		public function classic_login()
		{
			/*
			$user_export = new user();
			$user_export->email = $_POST["email"];
			$user_export->password = $_POST["password"];
			$user_export->type = "CLASSIC";
			
			
			$m = new MongoClient();
			
		    // select a database
		    $db = $m->juniorcoders;
			
			//select collection
		    $collection = $db->users;
			
			//Check if user & password combo is alright
			$all=$collection->find(); $gasit=false;
			foreach($all as $k)
			{
				if(!isset($k["password"]))
					continue;
				if($k["email"] == $user_export->email && $k["password"] == $user_export->password)
				{
					$user_export->name=$k["name"];
					$user_export->rang=$k["rang"];
					$this->login_user($user_export);
					return true;
				}

			}
			
			echo "nelogat";			
			return false;
			*/
		}
		
		
		//Adds a user to the DB
		public function add_new_user($user)
		{
			/*
			// connect to mongodb
		    $m = new MongoClient();

		    // select a database
		    $db = $m->juniorcoders;
			
		    $collection = $db->users;
			
			//See if there is already a user with the same _id or name
			$all=$collection->find(); $gasit=false;
			foreach($all as $k)
			{
				if($k["_id"] == $user->_id || $k["name"] == $user->name)
				{
					$gasit=true;
					echo "Utilizator gasit";
					break;
				}
			}
			if($gasit == false)
			{
				$document = (array) $user;
				$collection->insert($document);
				echo "Document inserted successfully";
			}
			*/

		  
		}
		
		
		//Logins a user
		public function login_user($user)
		{
			$this->put_in_session("is_logged","1");
			//$this->put_in_session("user_id",$user->_id);
			$this->put_in_session("user_name",$user->name);
			$this->put_in_session("user_email",$user->email);
			$this->put_in_session("user_rang", $user->rang);
			header('Location: /');
		}
		
		//Sanitizeaza input-ul
		public function secure($string)
		{
			if(isset($string))
			{
				$string=mysql_real_escape_string($string);
				$string=htmlspecialchars($string, ENT_QUOTES);
				return $string;
			}
			return $string;
		}
		
		//Cripteaza un string
		public function crypt($text)
		{
			$salt="A3cr3tfo@rt3m45e#@d";
			return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
		}
		
		//Decripteaza un string
		public function decrypt($text)
		{
			$salt="A3cr3tfo@rt3m45e#@d";
			return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
		}
	
		//Pune o valaore in sesiune
		public function put_in_session($key,$str)
		{
			$_SESSION[$key]=$this->crypt($str);
		}
		
		//Ia o valaore din sesiune
		public function get_from_session($key)
		{
			if(isset($_SESSION[$key]))
				return $this->decrypt($_SESSION[$key]);
			return NULL;
		}
		
		//Delogheaza un utilizator
		private function logout()
		{
			session_destroy();
			header('Location: /');
			
		}
	}
}

$obj_core = new class_core();

?>