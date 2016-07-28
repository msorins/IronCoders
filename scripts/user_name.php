
<?php
session_start();
/*
   require('JWT.php');
   $token = array();
   $token['id'] = '13';
   $token['username'] = 'ana';
   $login = JWT::encode($token, 'th@sIsL3l34ing@g%g');
   setcookie('token', $login, time() + 2*7*24*60*60,'/','ironcoders.com', false);

   echo json_encode($token);
   echo $login;
*/
   //$apilogin = file_get_contents('http://forum.ironcoders.com/api/login');
   //echo $apilogin."daaa";
   //if($apilogin->loggedIn != NULL && $apilogin->loggedIn == 'false')
   	  //$user_name = NULL;
	//else
	//{
		//$user_name=explode("/", $apilogin);
		//$user_name = $user_name[2];
		//$user_name = "sorynsoo";
		// To do user rang & stuff
		//$user_id=$userInfo['user_id'];
		//$user_token=$userInfo['identities'][0]['access_token'];
		//$user_rang=$user->data['user_rang'];
		//$user_cursuri_terminate=$user->data['user_cursuri_terminate'];
	//}
   if($_GET['type']=='logout')
   {
        session_destroy();
        header('Location: /');   
   }
   else
     if( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "true" )
     {
        $user_name = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
        $user_rang = $_SESSION['user_rang'];
        $user_cursuri_terminate = $_SESSION['user_cursuri_terminate'];
     }
     else
     {
        if(isset($_POST['user_name']) && isset($_POST['user_password']))
        {
            $url = 'http://forum.ironcoders.com/api/ns/login';
            $username = $_POST['user_name']; $password = $_POST['user_password'];
            $data = array('username' => $username, 'password' => $password);

            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            if ($result === FALSE) { 
               echo "Nelogat"; 
            } else  {
               $result = (array) json_decode($result);
               $_SESSION["username"] = $result['username'];  $user_name = $result['username'];
               $_SESSION["user_id"] = $result['uid']; $user_id = $result['uid'];
               $_SESSION['logged_in'] = "true";

               //For user_cursuri_terminate
               $m = new MongoClient();
               $db = $m->ironcoders_MongoDB;
               $query = $db->objects->findOne( array('uid' => $user_id));
               
               $user_cursuri_terminate = $query['user_cursuri_terminate'];
               $user_rang = $query["user_rang"];
                
               $_SESSION["user_cursuri_terminate"] = $user_cursuri_terminate;
               $_SESSION["user_rang"] = $user_rang;

               echo $user_cursuri_terminate." : ".$user_rang;

               echo "Logat";
            } 


            header('Location: /');   
        }
     }
?>
