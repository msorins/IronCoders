<?php
header('Content-Type: application/json');
//Mysql Connection
include 'config.php';

//Archive of problems struct
class arhivaStruct{
	public $arhiva_id;
	public $arhiva_nume;
	public $arhiva_adaugat_de;
	public $arhiva_sursa; 
	public $arhiva_autor;
	public $arhiva_cerinta;
	public $arhiva_timp;
	public $arhiva_memorie;
	public $arhiva_grupa;
	public $arhiva_grupa_nr;
	public $arhiva_numar_teste;
	public $arhiva_nr_rezolvitori;
	public $arhiva_nr_incercari;
	public $arhiva_concurs;
	public $arhiva_categorii;
	public $arhiva_afiseaza;
	public $arhiva_restrictioneaza_surse;
	public $arhiva_topic_id;
}

//Evaluator monitor jobs struct
class jobsStruct{
	public $job_id;
	public $job_problem_id;
	public $job_problem_name;
	public $job_owner;
	public $job_status;
	public $job_contest;
	public $job_total_points;
	public $job_tests_points = array();
	public $job_tests_time = array();
	public $job_tests_memory = array();
	public $job_tests_message = array();
	public $job_tests_groups;
	public $job_date;
	public $job_language;
}

class problemStruct{
	public $solved = array();
	public $tried = array();
}

class MongoExport{

	public function __construct(){

		//Get page type to call class Methods
		$type = NULL;

		if(isset( $_GET["type"])) 
			$type = $_GET["type"];

		if($type == "arhivaToJson")
			echo $this -> arhivaToJson();

		if($type == "jobsToJson")
			echo $this -> jobsToJson();

		if($type =="arhivaJsonToMongo")
			$this -> arhivaJsonToMongo( $this -> arhivaToJson() );

		if($type == "jobsJsonToMongo")
			$this -> jobsJsonToMongo( $this -> jobsToJson() );

		/* To do !!
		if($type == "newArhivaToMongo")
			$this -> newArhivaToMongo();
		if($type == "newJobToMongo")
			$this -> newJobToMongo();
		*/


		//Returns a JSON that cointains one users solved and tried problems
		if($type == "userProblemsToJson")
			echo $this -> userProblemsToJson( $_GET["username"] );

		//Returns a JSON object with all the usersnames
		if($type == "usersListMongo")
			echo $this -> usersListMongo();	

		//Receive a JSON object with all the usernames and upload it to MONGO
		if($type == "userProblemsJsonToMongo")
			$this -> userProblemsJsonToMongo( $this -> usersListMongo() );

		//Create topics in NodeBB for all existing problems ( from Mongo )
		if($type =="arhivaToNodebbTopicALL")
			echo $this -> arhivaToNodebbTopicALL();

		//Create topic for a specific problem
		if($type == "arhivaToNodebbTopic")
			echo $this -> arhivaToNodebbTopic( $_GET["title"], $_GET["content"], $_GET["tags"] );

		//Get the JSON to all topic content by title
		if($type == "getNodeBBTopicContent")
			echo $this -> getNodeBBTopicContent( $_GET["title"] );
	}


	public function arhivaToJson(){
			$query = mysql_query('SELECT * FROM `arhiva`');

			$output = array();
			while($k = mysql_fetch_array($query))
			{
				$crt = new arhivaStruct();
				$crt->arhiva_id = $k["arhiva_id"];
				$crt->arhiva_nume = $k["arhiva_nume"];
				$crt->arhiva_adaugat_de = $k["arhiva_adaugat_de"];
				$crt->arhiva_sursa = $k["arhiva_sursa"];
				$crt->arhiva_autor = $k["arhiva_autor"];
				$crt->arhiva_cerinta = $k["arhiva_cerinta"];
				$crt->arhiva_timp = $k["arhiva_timp"];
				$crt->arhiva_memorie = $k["arhiva_memorie"];
				$crt->arhiva_grupa = $k["arhiva_grupa"];
				$crt->arhiva_grupa_nr = $k["arhiva_grupa_nr"];
				$crt->arhiva_numar_teste = $k["arhiva_numar_teste"];
				$crt->arhiva_nr_rezolvitori = $k["arhiva_nr_rezolvitori"];
				$crt->arhiva_nr_incercari = $k["arhiva_nr_incercari"];
				$crt->arhiva_concurs = $k["arhiva_concurs"];
				$crt->arhiva_categorii = $k["arhiva_categorii"];
				$crt->arhiva_afiseaza = $k["arhiva_afiseaza"];
				$crt->arhiva_restrictioneaza_surse = $k["arhiva_restrictioneaza_surse"];
				$crt->arhiva_topic_id = $k["arhiva_topic_id"];

				array_push($output, $crt);
			}
			return json_encode($output);
	}

	public function jobsToJson($job_id){
		if( !isset( $_GET["job_id"] ) )
			$query = mysql_query('SELECT * FROM `jobs`');
		else
			$query = mysql_query('SELECT * FROM `jobs` WHERE `job_id` = `$job_id`');
		
		$output = array();
		while($k = mysql_fetch_array($query))
		{
			$crt = new jobsStruct();

			$crt->job_id = $k["job_id"];
			$crt->job_problem_id = $k["job_problem_id"];
			$crt->job_problem_name = $k["job_problem_name"];
			$crt->job_owner = $k["job_owner"];
			$crt->job_status = $k["job_status"];
			$crt->job_contest = $k["job_contest"];
			$crt->job_total_points = $k["job_total_points"];
			
			$crt2 = explode("#", $k["job_tests_points"]);
			for($k2=0; $k2<count($crt2); $k2++)
				array_push($crt->job_tests_points, $crt2[$k2]);

			$crt2 = explode("#", $k["job_tests_time"]);
			for($k2=0; $k2<count($crt2); $k2++)
				array_push($crt->job_tests_time, $crt2[$k2]);

			$crt2 = explode("#", $k["job_tests_memory"]);
			for($k2=0; $k2<count($crt2); $k2++)
				array_push($crt->job_tests_memory, $crt2[$k2]);

			$crt2 = explode("#", $k["job_tests_message"]);
			for($k2=0; $k2<count($crt2); $k2++)
				array_push($crt->job_tests_message, $crt2[$k2]);

			$crt->job_tests_groups = $k["job_tests_groups"];
			$crt->job_date = $k["job_date"];
			$crt->job_language = $k["job_language"];

			array_push($output, $crt);
		}

		return json_encode($output);
	}


	//Migrate all SQL arhiva ( problemele ) to MONGO
	public function arhivaJsonToMongo($json){
		$json = json_decode($json);

		$m = new MongoClient();
		$db = $m->ironcoders_MongoDB;

		$db->arhiva->drop();
		$db -> createCollection("arhiva");
		foreach($json as $k){
			$db->arhiva->insert($k);
		}
		echo 'Done';
	}

	//Migrate all SQL ( monitorul de evaluare ) to MONGO
	public function jobsJsonToMongo($json){
		$json = json_decode($json);

		$m = new MongoClient();
		$db = $m->ironcoders_MongoDB;

		$db->jobs->drop();
		$db->createCollection("jobs");
		foreach($json as $k){
			$db->jobs->insert($k);
		}
		echo 'Done';
	}

	public function userProblemsToJson($username)
	{
		if( $username == NULL )
			return "-1";

		$output = new problemStruct();

		$m = new MongoClient();
		$db = $m->ironcoders_MongoDB;

		$query = $db->arhiva->find( array('arhiva_afiseaza' => '1'))->fields( array( 'arhiva_id' =>true ,'arhiva_nume' => true, 'arhiva_sursa' => true, 'arhiva_grupa' => true, '_id' => false) );
		//$query = $db->arhiva->find( array('arhiva_afiseaza' => '1') );

		foreach($query as $k){
			// I've got the ids of all problem
			// Now query to form the solved and unsolved problems
			$query2 = $db->jobs->find( array('job_owner' => $username, 'job_problem_id' => $k["arhiva_id"]) );

			$points = 0; $submitted = false;
			foreach($query2 as $k2){
				$points = max($points, $k2["job_total_points"]);
				$submitted = true;
			}

			$k["points"] = $points;
			if($points == 100)
				array_push($output->solved, $k);
			else
				if($submitted == true)
					array_push($output->tried, $k);
		}
		
		return json_encode($output, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		//print_r($output);
	}

	public function userProblemsJsonToMongo( $list ){

		$list = json_decode( $list );

		$m = new MongoClient();
		$db = $m->ironcoders_MongoDB; 
	
		foreach($list as $k){
			$pb = json_decode(  $this -> userProblemsToJson( $k -> username ) );
			print_r($pb);
			$id = $k->_id;
			$id = $id->{'$id'};
			$id = (string)$id;
			echo $id. "   #   ";
			$db -> objects -> update( 
				array('_id' => new MongoId($id)), 
				array('$set' =>  array("pb" => $pb ))
			);
			
		}
		echo "Done";

	}

	public function usersListMongo(){
		$output = array();

		$m = new MongoClient();
		$db = $m->ironcoders_MongoDB;

		$query = $db->objects->find( array( 'username' => array('$exists' => true ))) -> fields( array( 'username' => true ));

		foreach($query as $k){
			array_push($output, $k);
		}

		return json_encode($output);
	}

	public function arhivaToNodebbTopic($title, $content, $tags){
		if($title == NULL || $content == NULL)
			return -1;

		require('user_name.php');
		$str = exec("curl -H \"Authorization: Bearer 50e94fa6-76e7-41e2-b3df-2a04d98d508b\" --data \"title=".$title."&content=".$content."&cid=5\" http://localhost:4567/api/v1/topics");
		
		echo $str;

	}

	public function arhivaToNodebbTopicALL(){

		$m = new MongoClient();
		$db = $m -> ironcoders_MongoDB;

		$query = $db->arhiva->find();

		foreach ($query as $k) {
			$this->arhivaToNodebbTopic($k['arhiva_nume'], 'Discutii despre problema '.$k['arhiva_nume'], 'No tags');
		}

		return "Done";
	}

	public function getNodeBBTopicContent($title){
		if($title == NULL)
			return -1;

		$m = new MongoClient();
		$db = $m -> ironcoders_MongoDB;

		$query = $db->objects->find( array( 'title' => $title ));

		foreach ($query as $k){
			$topicslug = $k['slug'];
		}

		return file_get_contents('http://forum.ironcoders.com/api/topic/'.$topicslug);
	}


}

$mongoExportObj = new MongoExport();

?>