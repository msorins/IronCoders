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

	public function jobsToJson(){
		$query = mysql_query('SELECT * FROM `jobs`');
		
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
}

$mongoExportObj = new MongoExport();

?>